@include('menu')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Libri Salvati - Open Library</title>
    <link rel="stylesheet" href="{{ asset('css/OL_salvati.css') }}">
    <script src="{{ asset('js/OL_salvati.js') }}" defer></script> 
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">

</head>
<body>
    <h1>Libri Salvati - Open Library</h1>
    <div class="flex-container">
        <div class="container" id="saved-results-container"></div>
    </div>
</body>
</html>