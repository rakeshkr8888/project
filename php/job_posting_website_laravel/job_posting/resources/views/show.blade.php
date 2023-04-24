<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv='X-UA-Compitable' content="ie=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" href="images/favicon.ico">
        <link rel="stylesheet" href="{{asset("cssfile/style.css")}}">
        <link rel="stylesheet" href="{{asset('cssfile/show.css')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
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



 <!--======================================SEARCH =============================-->
 <section class="search_bar">
    <div class="container search_container">
        <form action="/" method="GET">
            <div class="search">
                <span><i class="uil uil-search"></i></span>
                <input type="text" name="search" placeholder="larvel senior developer etc">
            </div>
            <button class="btn btn_primary" type="submit">search</button>
        </form>
    </div>
</section>




<!--============================ MAIN ============================-->
<main>
    <div class="container show_container">
        <div class="show_logo">
            <img src={{$listing->logo?asset('/storage/'.$listing->logo):asset("images/acme.png")}} alt="image"> 
        </div>
        <div class="show_info">
            <h4>{{$listing['title']}}</h4>
            <h5>{{$listing->company}}</h5>
            <div>{{$listing->location}}</div>
            <ul class="tags">
                <?php
                    $tags=explode(',',$listing['tag']);
                    // echo $tags;
                ?>
                @foreach ($tags as $tag)
                <li><span>{{$tag}}</span></li>
                @endforeach
            </ul>
            <div>
                <div>Description</div>
                {{$listing['description']}}
            </div>
            <div><a href="email:{{$listing['email']}}">Contact Email: {{$listing['email']}}</a></div>
            <div><a href="{{$listing['website']}}">visit: {{$listing['website']}}</a></div>
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
</body>
</html>
