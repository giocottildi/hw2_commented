<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="{{ asset('js/login.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <script src="{{ asset('js/menu.js') }}" defer></script>
</head>
<body>
@include('menu')
    <div id="container">
        <section id="login">
            <div id="log-account">
                <div id="accesso">
                    <h1>Accedi</h1>
                    @if ($errors->any())
                        <div class="error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div id="accedi-account">
                        <form name="log-in" method="post" action="{{ route('login') }}" id="log-in">
                            @csrf
                            <label for="username">Username <input type="text" name="username" placeholder="username" value="{{ old('username') }}"></label>
                            <label for="password">Password <input type="password" name="password" placeholder="Password"></label>
                            <label>&nbsp;<input class="submit" type="submit" value="Accedi"></label>
                        </form>
                    </div>
                    <div id="links"><a href="{{ url('register') }}">Non hai ancora un account?</a></div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
