

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title>Sherlock Collection</title>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}"> 
    <script src="{{ asset('js/menu.js') }}" defer></script> 
</head>
<body>
    <header>
        <div id="flex-container">
            <div id="menu" class="hidden"><img id="menu" src="img/Menu.png">
                <div id="container-menu" class="hidden">
                    <div id="sub-menu">
                        <a class="sub-item" class="smooth-scroll" href="#collezione">COLLEZIONE</a> 
                        <a class="sub-item" class="smooth-scroll" href="#exit">USCITE</a> 
                        <a class="sub-item" class="smooth-scroll" href="#faq">FAQ</a> 
                        <a class="sub-item" class="smooth-scroll" href="#offerta">OFFERTA ABBONAMENTO</a> 
                    </div>
                </div>
            </div>

            <div class="flex-item1"><a href="http://www.rbaitalia.it/"> <img src="img/RBA.png"></a></div>
            <div class="flex-item2"><a> <img src="img/logo.png"></a></div>
            @if(session()->has('username'))
                <div id="account"> <h1>{{ session('username') }}</h1>
            @else
                <div id="account"> <h1>MY ACCOUNT</h1>
            @endif
                <div id="container-account"  class="hidden">
                    <div id="account-menu">
                        @if(session()->has('username'))
                            <a id="log-out" class="account-item" href="{{ route('home') }}">HOME</a>
                            <a id="log-out" class="account-item" href="{{ route('logout') }}">LOGOUT</a>
                            <a class="account-item" href="{{ route('creaLista') }}">CREA LISTA</a>
                            <a class="account-item" href="{{ route('page_ricerca_OL') }}">RICERCA OL</a>
                            <a class="account-item" href="{{ route('page_OL_salvati') }}">LIBRI OL SALVATI</a>
                            <a class="account-item" href="{{ route('spotify') }}">CERCA PLAYLIST</a>
                        @else
                            <a id="log-out" class="account-item" href="{{ route('home') }}">HOME</a>
                            <a class="account-item" href="{{ route('login') }}">LOGIN</a>
                            <a class="account-item" href="{{ route('register') }}">REGISTRAZIONE</a>
                            <a class="account-item" href="{{ route('login') }}">CREA LISTA</a>
                            <a class="account-item" href="{{ route('login') }}">RICERCA OL</a>
                            <a class="account-item" href="{{ route('login') }}">LIBRI OL SALVATI</a>
                            <a class="account-item" href="{{ route('login') }}">CERCA PLAYLIST</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
