<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset("img/llogo.png") }}">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <script src="{{ asset("js/app.js") }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <title>{{ $title ?? "LaraForums" }}</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset("img/llogo.png") }}" alt=""></a>
            <a href="/" id="title-link"><h5>araForums</h5></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("home") || request()->is("question/")?"link-active":"" }}" href="/home" id="link-id">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("category") || request()->is("category/create")?"link-active":"" }}" href="/category" id="link-id">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("question/create")?"link-active":"" }}" href="/question/create" id="link-id">Question</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("profile") || request()->is("profile/active") || request()->is("profile/questions") ?"link-active":"" }}" href="/profile" id="link-id">Profile</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="content">
        @yield('content')
    </div>

    <section id="footer-template">
        <h5 class="text-center">&copy;2021 - LaraForums</h5>
        <p class="text-center">laraforums@info.com</p>
    </section>
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    @stack('script')
</body>
</html>