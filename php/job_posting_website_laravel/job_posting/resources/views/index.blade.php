<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv='X-UA-Compitable' content="ie=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" href="images/favicon.ico">
        <link rel="stylesheet" href="{{asset("cssfile/style.css")}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
        <!--Alpine js-->
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





        <!-- =================Header=========================-->
        <header>
            <div class="container header_container">
                {{-- <div class="header_main"> --}}
                    <div class="header_img">
                        <img src="images/no-image.png" alt="">
                    </div>
                    <ul class="header_content">
                        <li><h2>JOB POSTING</h2></li>
                        <li><p>Find and post job and project</p></li>
                        @auth
                        @else
                        <li><a class="btn" href="/register">Click here to sign up</a></li>
                        @endauth
                    </ul>
                {{-- </div> --}}
            </div>
        </header>

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







        <!-- =================Main=========================-->
        <main>
            <div class="container main_container">
            <div class="listings">
                @unless(count($listings)==0)
                @foreach ($listings as $listing)
                <div class="listing">
                    <div class="listing_logo">
                        <img src="{{$listing->logo?asset('/storage/'.$listing->logo):asset('images/no-image1.png')}}" alt="image">
                    </div>
                    <div class="listing_info">
                        <a href="/show/{{$listing['id']}}"><h4>{{$listing['title']}}</h4></a>
                        <h5><i class="uil uil-building"></i>{{$listing['company']}}</h5>
                        <p><i class="uil uil-location-pin-alt"></i>{{$listing['location']}}</p>
                        <div class="tags">
                            <?php 
                                $tags=explode(",",$listing['tag']);
                            ?>
                            @foreach ($tags as $tag)
                            <span><a href="?tag={{$tag}}">{{$tag}}</a></span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p>No listing found</p>
                @endunless
            </div>
            <div>
                {{-- {{$listings->links()}} --}}
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