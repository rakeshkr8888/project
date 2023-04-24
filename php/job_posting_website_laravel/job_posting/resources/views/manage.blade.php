<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv='X-UA-Compitable' content="ie=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" href="images/favicon.ico">
        <link rel="stylesheet" href="{{asset("cssfile/style.css")}}">
        <link rel="stylesheet" href="{{asset("cssfile/manage.css")}}">
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





        <!-- =================Header=========================-->
        <header>
            <div class="container header_container">
               <h2>Mange our job listing</h2>
            </div>
        </header>



        <!-- ======================== MAIN =========================-->
        <main>
            <div class="container manage_container">
                <div>
                    <table>
                        @unless(count($listings)==0)
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            ?>
                            @foreach($listings as $listing)
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><a href="/show/{{$listing->id}}">{{$listing->title}}</a></td>
                                <td>
                                    <a href="/edit/{{$listing->id}}">Edit</a>
                                    <form action="/delete/{{$listing->id}}" method="POST">
                                        @csrf
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <p>No listing found</p>
                        @endunless
                    </table>
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