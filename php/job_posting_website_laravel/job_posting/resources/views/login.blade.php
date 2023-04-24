<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv='X-UA-Compitable' content="ie=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" href="images/favicon.ico">
        <link rel="stylesheet" href="{{asset("cssfile/style.css")}}">
        <link rel="stylesheet" href="{{asset("cssfile/login.css")}}">
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




        <!--=============================  LOGIN ======================-->
        <main>
            <div class="container login_container">
                <h4>Login</h4>
                <div>
                    <form action="/authenticate" method="POST">
                        @csrf
                        <div class="form_item">
                            <div class="input">
                                <label for="email">Email: </label>
                                <input type="email" name="email" value="{{old("email")}}">
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
                                <label for="password">password: </label>
                                <input type="password" name="password" value="{{old("password")}}">
                            </div>
                        </div>
                        <button class="btn btn_primary" type="submit">Login</button>
                    </form>
                </div>
                <div class="credentials">
                    <p>email: user@gmail.com  &nbsp password: 12345678</p>
                    <p>email: harry@gmail.com  &nbsp password: 12345678</p>
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