<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv='X-UA-Compitable' content="ie=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" href="images/favicon.ico">
        <link rel="stylesheet" href="{{asset("cssfile/style.css")}}">
        <link rel="stylesheet" href="{{asset("cssfile/create.css")}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <script src="//unpkg.com/alpinejs" defer></script>
        <title>job posting</title>
    </head>
    <body>

        <!-- =================NAVBAR=========================-->
        
        <nav>
            <div class="container nav_container" >
                <div class="logo">
                    <a href="/"><img src="{{asset("images/laravel-logo.png")}}" alt="image"></a>
                </div>
                <div>
                    <ul class="nav_menu">
                        @auth
                        <li><a href="/manage">Manage</a></li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                        <li><h3>Welcome {{auth()->user()->name}}</h3></li>
                        @else
                        <li><a href="/register">Register</a></li>
                        <li><a href="/login">Login</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>


        <!-- ======================== Header =========================-->
        <header>
            <div class="header_container">
            <h2>Edit</h2>
            <p>Edit: {{$listing->title}}</p>
            </div>
        </header>
        




        <!-- ========================Main =========================-->
        <main>
            <div class="container main_container">
                <div class="create_form">
                    <form action="/update/{{$listing->id}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form_item">
                            <div class="input">
                                <label for="title">Title: </label>
                                <input type="text" name="title" placeholder="laravel senior developer" value="{{$listing->title}}">
                            </div>
                            <div class="error">
                            @error('title'){
                                {{$message}}
                            }
                            @enderror
                            </div>
                        </div>
                        <div class="form_item">
                            <div class="input">
                            <label for="company">Company Name: </label>
                            <input type="text" name="company" value="{{$listing->company}}">
                            </div>
                            <div class="error">
                                @error('company'){
                                    {{$message}}
                                }
                                @enderror
                            </div>
                        </div>
                        <div class="form_item">
                            <div>
                            <label for="location">Location: </label>
                            <input type="text" name="location" placeholder="delhi mumbai" value='{{$listing->location}}'>
                            </div>
                            <div class="error">
                                @error('location'){
                                    {{$message}}
                                }
                                @enderror
                                </div>
                        </div>
                        <div class="form_item">
                            <div class="input">
                            <label for="tag">Tag(comma seperated): </label>
                            <input type="text" name="tag" placeholder="laravel,php,api,js" value="{{$listing->tag}}">
                            </div>
                            <div class="error">
                                @error('tag'){
                                    {{$message}}
                                }
                                @enderror
                                </div>
                        </div>
                        <div class="form_item">
                            <div class="input">
                                <label for="logo">Company Logo: </label>
                                <input type="file" name="logo" value="{{$listing->logo}}">
                            </div>
                        </div>
                        <div class="form_item">
                            <div class="input">
                            <label for="email">Email: </label>
                            <input type="email" name="email" placeholder="example@gmail.com" value="{{$listing->email}}">
                            </div>
                            <div class="error">
                                @error('email'){
                                    {{$message}}
                                }
                                @enderror
                                </div>
                        </div>
                        <div class="form_item">
                            <div class="input">
                            <label for="website">website url: </label>
                            <input type="text" name="website" placeholder="https://google.com" value="{{$listing->website}}">
                            </div>
                            <div class="error">
                                @error('website'){
                                    {{$message}}
                                }
                                @enderror
                            </div>
                        </div>
                        <div class="form_item">
                            <div class="input">
                            <label for="description">Job Description: </label>
                            <textarea name="description" cols="30" rows="10" value="{{$listing->description}}">{{$listing->description}}</textarea>
                            </div>
                            <div class="error">
                                @error('description'){
                                    {{$message}}
                                }
                                @enderror
                                </div>
                        </div>
                        <button class="btn" type="submit" name="submit">Edit</button>
                    </form>
                </div>        
            </div>
        </main>





        <!-- ========================FOOTER =========================-->
        <footer>
            <div class="container footer_container">
            <div class="copyright">
                copyright &copy; 2023 all right reserved
            </div>
            <div class="post_job">
                <a class="btn btn_primary" href="/create">Post Job</a>
            </div>
            </div>
        </footer>

        @if(session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show=false,3000)" x-show="show" class="flash_message">
            <p>{{session('message')}}</p>
        </div>
        @endif
    </body>
</html>