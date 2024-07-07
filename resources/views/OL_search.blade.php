<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ricerca Libri - Open Library</title>
    <link rel="stylesheet" href="{{ asset('css/open_library.css') }}">
    <script src="{{ asset('js/open_library.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</head>
<body>
    @include('menu')

    <h1>Ricerca Libri - Open Library</h1>
    <form id="search-form">
        @csrf
        <input type="text" id="search-input" placeholder="Cerca un libro...">
        <button type="submit" id="submit">Cerca</button>
    </form>
    <h1 id="result-title"></h1>
    <div class="container" id="results-container">
        
    </div>
</body>
</html>