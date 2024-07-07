
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sherlock Collection</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quotes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gutenberg.css') }}">
    <script src="{{ asset('js/index.js') }}" defer></script>
    <script src="{{ asset('js/quotes.js') }}" defer></script>
    <script src="{{ asset('js/vedi_uscite.js') }}" defer></script>
    <script src="{{ asset('js/vedi_faq.js') }}" defer></script>

</head>
<body>

<header>
    <div id="flex-container">
        <div id="menu">
            <img id="menu-icon" src="{{ asset('img/Menu.png') }}">
            <div id="container-menu" class="hidden">
                <div id="sub-menu">
                    <a class="sub-item" href="#collezione">COLLEZIONE</a>
                    <a class="sub-item" href="#exit">USCITE</a>
                    <a class="sub-item" href="#faq">FAQ</a>
                    <a class="sub-item" href="#offerta">OFFERTA ABBONAMENTO</a>
                </div>
            </div>
        </div>
        <div class="flex-item1">
            <a href="http://www.rbaitalia.it/">
                <img src="{{ asset('img/RBA.png') }}">
            </a>
        </div>
        <div class="flex-item2">
            <a href="#">
                <img src="{{ asset('img/logo.png') }}">
            </a>
        </div>
        <div id="account">
            <h1>
                @if(session('username'))
                    {{ session('username') }}
                @else
                    MY ACCOUNT
                @endif
            </h1>
            <div id="container-account" class="hidden">
                <div id="account-menu">
                    @if(session('username'))
                        <a class="account-item" href="{{ route('home') }}">HOME</a>
                        <a class="account-item" href="{{ route('logout') }}">LOGOUT</a>
                        <a class="account-item" href="{{ route('creaLista') }}">CREA LISTA</a>
                        <a class="account-item" href="{{ route('page_ricerca_OL') }}">RICERCA OL</a>
                        <a class="account-item" href="{{ route('page_OL_salvati') }}">LIBRI OL SALVATI</a>
                        <a class="account-item" href="{{ route('spotify') }}">CERCA PLAYLIST</a>
                        
                    @else
                        <a class="account-item" href="{{ route('home') }}">HOME</a>
                        <a class="account-item" href="{{ route('login') }}">LOGIN</a>
                        <a class="account-item" href="{{ route('register') }}">REGISTRAZIONE</a>
                        <a class="account-item" href="{{ route('creaLista') }}">CREA LISTA</a>
                        <a class="account-item" href="{{ route('page_ricerca_OL') }}">RICERCA OL</a>
                        <a class="account-item" href="{{ route('page_OL_salvati') }}">LIBRI OL SALVATI</a>
                        <a class="account-item" href="{{ route('spotify') }}">CERCA PLAYLIST</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<nav>
    <div id="flex-container2">
        <button class="flex-item"><a href="#collezione">COLLEZIONE</a></button>
        <button class="flex-item"><a href="#exit">USCITE</a></button>
        <button class="flex-item"><a href="#faq">FAQ</a></button>
        <button class="flex-item"><a href="#offerta">OFFERTA<br>ABBONAMENTO</a></button>
    </div>
</nav>

<article>
    <section id="prima_sezione">
        <div class="carrousel">
            <div class="container">
                <div id="flex-container">
                    <div class="item-info">
                        <h1 class="titolo">
                            <strong>
                                <span>EDIZIONE PER COLLEZIONISTI DEDICATA AL PIÙ ABILE DEI DETECTIVE, SHERLOCK HOLMES</span>
                            </strong>
                        </h1>
                    </div>
                    <div class="item-box">
                        <p class="offerta_testo">sconti esclusivi</p>
                        <p class="offerta_subtesto">e fantastici regali</p>
                        <button><a href="#offerta" class="scrolla-smooth">VEDI OFFERTA</a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="collezione">
        <div class="barra">
            <span><a>COLLEZIONE</a></span>
        </div>
        <div id="scatola-item">
            <div class="testo">
                <strong><span><h4>La collezione più completa del re dei detective</h4></span></strong>
            </div>
            <div class="subtesto">
                <br><br>
                Sherlock Holmes fa parte di quella famiglia di personaggi che superano la fama del loro stesso creatore diventando dei miti letterari. Fin dalla sua creazione, la popolarità di Sherlock Holmes fu tale che, con Conan Doyle ancora in vita, altri autori contribuirono all’immortalità del personaggio scrivendo un gran numero di romanzi e racconti con il detective come protagonista.
                <br><br>
                Questa collezione riunisce per la prima volta tutti i casi che hanno trasformato Sherlock Holmes in un mito a livello mondiale: le avventure e i romanzi scritti da Arthur Conan Doyle, il suo creatore, più una selezione di avventure sul personaggio scritte da altri autori contemporanei a Conan Doyle.
                <br><br>
                Un’edizione unica che ci permette di approfondire come non mai la figura del detective più famoso di tutti i tempi.
                <br><br>
                <h4>Un’edizione per collezionisti che evoca un’epoca unica</h4>
                <br><br>
                Un’esclusiva edizione vintage che riproduce le copertine della rivista <em>The Strand</em>, paradigma dello stile vittoriano dove furono pubblicate la maggior parte delle avventure del popolare detective. Inoltre negli interni, le illustrazioni delle sue prime pubblicazioni.
            </div>
            <div class="magazine">
                <a>
                    <img src="{{ asset('img/libri.jpg') }}" id="magazine-collezione">
                    <img src="{{ asset('img/left-arrow.png') }}" id="left-arrow">
                    <img src="{{ asset('img/right-arrow.png') }}" id="right-arrow">
                </a>
            </div>
            <div class="pdf">
                <a href="{{ asset('documents/sh.pdf') }}">GUIDA ALL'OPERA</a>
            </div>
        </div>
    </section>

    <section class="quote">
        <div id="quote-container">
            <div id="quote-introduction">
                <h1>Eccoti le più famose quote di Sherlock Holmes</h1>
            </div>
            <div id="effective-quote">
                <div id="random-quote">
                    <h1></h1>
                </div>
            </div>
        </div>
    </section>



            
    <section id="Gutenberg-ricerca" data-searched="{{ session('searched') ? 'true' : 'false' }}">
        <div class="container">


            <!-- Form di ricerca Gutenberg -->
            @include('gutenberg')

            <!-- Mostra eventuali risultati della ricerca solo se è stato effettuato -->
            <!-- Mostra eventuali risultati della ricerca solo se è stato effettuato -->
            @if(isset($books) && isset($books['results']) && count($books['results']) > 0)
                <h2>Risultati della Ricerca Gutenberg</h2>
                <ul>
                    @foreach($books['results'] as $book)
                        @if(isset($book['authors']) && count($book['authors']) > 0)
                            <li>
                                <strong>Titolo:</strong> {{ $book['title'] }}<br>
                                @php $authorNames = []; @endphp
                                @foreach($book['authors'] as $author)
                                    @php $authorNames[] = $author['name']; @endphp
                                @endforeach
                                <strong>Autore:</strong> {{ implode(', ', $authorNames) }}<br>
                                <!--La funzione implode() in PHP viene utilizzata per concatenare gli elementi di un array in una stringa, 
                                    separando ciascun elemento con un separatore specificato. -->
                            </li>
                            <br>
                        @endif
                    @endforeach
                </ul>
            @elseif(isset($books))
                <p>Nessun risultato trovato.</p>
            @endif

        </div>
    </section>
    <section id="elenco-view">
    </section>

    
    <section id="exit">
        <div class="barra">
            <span>
                <a>USCITE</a>
            </span>
        </div>
        <div id="flex">
                <div class="presentazione-uscita">
                    <h1>USCITA 1 </h1>
                    <h2>IL MASTINO DEI BASKERVILLE</h2>
                    <img src="{{ asset('img/uscita1.png') }}">             
                </div>
                <div class="presentazione-uscita">
                    <h1>USCITA 2 </h1>
                    <h2>UNO STUDIO IN ROSSO</h2>
                    <img src="{{ asset('img/uscita2.png') }}">
                </div>
                <div class="presentazione-uscita">
                    <h1>USCITA 3 </h1>
                    <h2>IL SEGNO DEI QUATTRO</h2>
                    <img src="{{ asset('img/uscita3.png') }}">
                </div>
        </div>

    </section>

    <section>

            <div class="linkbar">
                <span id="uscite-js" class="uscite">
                    <a>VEDI TUTTE LE USCITE</a>
                </span>
                    <div id="nascosto" class="hidden">
                        <div id="all_uscite">
                            <!-- Gli elementi <h1> saranno inseriti qui tramite JavaScript -->                   
                        </div>
                    </div>
                <span id="faq" class="uscite">
                    <a>FAQ - CONDIZIONI PARTICOLARI</a>
                </span>
                    <div id="faq-nascosto" class="hidden">
                        <div id="all_faq">
                            <!-- Gli elementi <h1> saranno inseriti qui tramite JavaScript -->                   
                        </div>
                    </div>
                
            </div>
        </section>
        <section id="offerta">
        <div class="barra">
            <span>
                <a>OFFERTA ABBONAMENTO</a>
            </span>
        </div>
        <div class ="elenco">
            <h3> <a>1</a> Scegli da quale numero abbonarti</h3>
        </div>
    </section>

    <section class="abbonamenti">
        <div id="container-up">
            <div class="flex-img"><a><img src="{{ asset('img/libri1.png') }}"></a></div>
            <div class="flex-img"><a><img src="{{ asset('img/libri2.png') }}"></a></div>
        </div>
        </section>
        <section>
        <div id="container-down">
            <div class="flex-img"><img src="{{ asset('img/libri3.png') }}"></div>
            <div class="flex-img"><img src="{{ asset('img/libri4.png') }}"></div>
        </div>
    </section>
    <section>
        <div class="elenco">
            <h3> <a>2</a> REGALI ESCLUSIVI RISERVATI AGLI ABBONATI <br>
                <h5>Regali non condizionati all’acquisto ed esenti dalla disciplina delle operazioni a premio. L’Editore si riserva di modificare eventualmente la forma ed il colore dell’oggetto. In caso di esaurimento scorte l’oggetto potrebbe essere sostituito con un regalo di pari valore.</h5>
            </h3>
        </div>
        <div id="container">
            <div class="flex-regalo"><img src="{{ asset('img/regalo1.jpg') }}">
                <h6>CON IL 3° INVIO <br> </h6>
                    <h7>LA PRATICA AGENDA DA VIAGGIO. PERFETTA PER SCRIVERE E ANNOTARE PENSIERI, CON COPERTINA RIGIDA IN TESSUTO NERO, CHIUSURA A ELASTICO E PRATICO SEGNALIBRO</h7>
            </div>
            <div class="flex-regalo"><img src="{{ asset('img/regalo2.jpg') }}">
                <h6>CON IL 6° INVIO <br> </h6>
                <h7>CINQUE MAGNIFICHE STAMPE IN EDIZIONE LIMITATA DI GRANDE FORMATO CON UNA SELEZIONE DELLE MEMORABILI COPERTINE DELLO STRAND MAGAZINE. 
                    <br>SPLENDIDAMENTE STAMPATE IN CARTA ARENA NATURAL SMOOTH DI 200 GR E PRESENTATE IN UNA ELEGANTE CARTELLA. MISURE: 297X420MM</h7>
            </div>
            <div class="flex-regalo"><img src="{{ asset('img/regalo3.jpg') }}">
                <h6>A PARTIRE DAL 10° INVIO <br> </h6>
                <h7>RICEVERAI 3 NUMERI DELLA RIVISTA STORICA NATIONAL GEOGRAPHIC</h7>
            </div>
        </div>
    </section>
    <section class="elenco-offerta">
        <div class="elenco">
            <h3> <a>3</a> SPESE DI SPEDIZIONE GRATIS SOLO SE TI ABBONI
                CON CARTA DI CREDITO O PAYPAL
            </h3>
        </div>
        
        <div class="elenco">                
            <h3> <a>4</a> Potrai interrompere il tuo abbonamento in qualsiasi momento / Diritto di recesso (D.Lgs. 206/2005)</h3>
        </div>
        <div class="elenco">
            <h3> <a>5</a> Garanzia di non perdere alcun volume della collezione</h3>                
        </div>
        <div class="elenco">               
            <h3> <a>6</a> Diritto alla sostituzione. In caso il prodotto ti pervenisse danneggiato, avrai diritto alla sostituzione</h3>
        </div>
    </section>


</article>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="logo">
                    <a href="http://www.rbaitalia.it/">
                        <img src="{{ asset('img/RBA.png') }}">
                    </a>
                </p>
                <p class="link">
                    <a href="http://www.rbaitalia.it/">ITALIA</a>
                </p>
            </div>
        </div>
    </div>
    <div class="flex-tastini">
        <div class="flex-item"><a>PRIVACY POLICY & COOKIE</a></div>
        <div class="flex-item"><a>LEGALE</a></div>
        <div class="flex-item"><a>GESTISCI I COOKIE</a></div>
    </div>
    <div class="back-to-the-top">
        <a href="#"><img src="{{ asset('img/fake-button.png') }}"></a>
    </div>
</footer>

</body>
</html>
