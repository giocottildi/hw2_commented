
<!DOCTYPE html>
<html>
<head>
    <title>Spotify2</title>
    <link rel="stylesheet" href="{{ asset('css/spotify.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/spotify.js') }}" defer></script>
</head>
<body>
@include('menu')

    <div id="overlay" class="hidden"></div>
 
    <section id="search">
        <form id="form-playlist" method="get" action="{{ url('spotify') }}">
            @csrf
            <div class="search">
                <input type="text" name="search" id="search-playlist" class="searchBar" placeholder="inserisci la ricerca">
                <input type="submit" value="Cerca">
            </div>
        </form>
    </section>
    
    <section id="flex-spotify">
        <div class="container">
            <div id="results"></div>
        </div>
        
        <!--CRONOLOGIA -->
        <div id="flex-cronologia">
            <div id="sub-flexbox-cronologia">
                <div id="cronologia-title"><a>CRONOLOGIA</a></div>
                <div>
                    <button id="elimina-tutto">
                        <a id="cestina-cronologia"><img src="img/cestino.jpg"></a>
                    </button>
                </div>
            </div>
            <div id="container-cronologia"></div>
        </div>
    </section>
</body>
</html>
