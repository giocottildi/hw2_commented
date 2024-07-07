<!DOCTYPE html>
<html>
<head>
    <title>Registrazione</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <script src="{{ asset('js/login.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <script>

        const CHECK_USERNAME_URL = "{{ URL::to('signup/check/username') }}";
        const CHECK_EMAIL_URL = "{{ URL::to('signup/check/email') }}";
    </script>
</head>
<body>
    @include('menu')

    @if(isset($errore))
        <p class="errore">
            Credenziali non valide.
        </p>
    @endif

    <div id="container">
        <section id="register"> 
            <div id="log-account">
                <div id="registrazione">
                    <h1>Registrati</h1>

                    <div id="registra-account">
                        <form name="sign-in" id="sign-in" method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="name">
                                <label>Name <input type="text" name="name" placeholder="name" value="{{ old('name') }}"></label>
                                    
                                    <div><span>Devi inserire il tuo nome</span></div>

                            </div>
                            <div class="surname">
                                <label>Surname <input type="text" name="surname" placeholder="surname" value="{{ old('surname') }}"></label>

                                    <div><span>Devi inserire il tuo cognome</span></div>
                            </div>
                            <div class="username">
                                <label>Username <input type="text" name="username" placeholder="username" value="{{ old('username') }}"></label>

                                    <div><span>Nome utente non disponibile</span></div>

                            </div>
                            <div class="email">
                                <label>E-mail <input type="text" name="email" placeholder="email" value="{{ old('email') }}"></label>

                                    <div><span>Indirizzo email non valido</span></div>
                            </div>
                            <div class="password">
                                <label>Password <input type="password" name="password" placeholder="Password"></label>
                                
                                    <div><span>Inserisci almeno 8 caratteri</span></div>
                            </div>

                            @if(isset($error))
                                @foreach($error as $err)
                                    <div class="errorj"><span>{{ $err }}</span></div>
                                @endforeach
                            @endif

                            <label>&nbsp;<input class="submit" type="submit" value="Registra"></label>
                        </form>
                    </div>

                    <div id="links"><a href="{{ route('login') }}">Hai già un account?</a></div>
                </div>
            </div>
        </section>
    </div>

</body>
</html>
