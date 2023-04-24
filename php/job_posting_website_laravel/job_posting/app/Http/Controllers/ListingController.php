<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    public function index(){
        // return view("index",["listings"=>Listing::latest()->filter(request(['tag','search']))->paginate(4)]);
        return view("index",["listings"=>Listing::latest()->filter(request(['tag','search']))->get()]);
    }

    public function show(Listing $listing){
        // dd($listing);
        return view('show',["listing"=>$listing]);
    }

    public function create (){
        return view('create');
    }

    public function store(Request $request){
        $formFilled=$request->validate([
            "title"=>"required",
            "company"=>"required",
            "location"=>"required",
            "tag"=>"required",
            "email"=>['required',"email"],
            "website"=>"required",
            "description"=>"required"
        ]);

        if($request->hasFile('logo')){
            $formFilled['logo']=$request->file('logo')->store('logos','public');
        }

        $formFilled['user_id']=auth()->id();
        Listing::create($formFilled);
        return redirect('/')->with('message',"Listing created successfully");
    }

    public function manage(){
        return view('manage',["listings"=>auth()->user()->listings()->get()]);
        // return view('manage',["listings"=>Listing::all()]);
    }

    public function edit(Listing $job_id){
        if($job_id->user_id!=auth()->id()){
            abort(403,"UNAUTHORIZED ACTION");
        }
        return view('edit',["listing"=>$job_id]);
    }    

    public function update(Listing $job_id, Request $request){
        if($job_id->user_id!=auth()->id()){
            abort(403,"UNAUTHORIZED ACTION");
        }

        $formFilled=$request->validate([
            "title"=>"required",
            "company"=>"required",
            "location"=>"required",
            "website"=>"required",
            "email"=>["required","email"],
            "description"=>"required",
            "tag"=>"required"
        ]);

        if($request->hasFile('logo')){
            $formFilled['logo']=$request->file('logo')->store('logos','public');
        }
        $job_id->update($formFilled);
        return back()->with('message',"updated successfully");
    }

    public function delete(Listing $job_id, Request $request){
        if($job_id->user_id!=auth()->id()){
            abort(403,"UNAUTHORIZED ACTION");
        }

        $job_id->delete();
        return back()->with("message","listing deleted successfully");
    }
}
