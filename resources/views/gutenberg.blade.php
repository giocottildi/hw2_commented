
    <form id="form1" method="GET" action="{{ route('gutenberg.search') }}">
        Inserisci il genere di un libro
        <select id='topic' name="topic">
            <option value="Crime" {{ session('lastTopic') == 'Crime' ? 'selected' : '' }}>Crimine</option>
            <option value="Romance" {{ session('lastTopic') == 'Romance' ? 'selected' : '' }}>Romanzo</option>
            <option value="Children" {{ session('lastTopic') == 'Children' ? 'selected' : '' }}>Per bambini</option>
            <option value="Thriller" {{ session('lastTopic') == 'Thriller' ? 'selected' : '' }}>Thriller</option>
        </select>
        <br>
        Inserisci la lingua del libro
        <select id='language' name="language">
            <option value="it" {{ session('lastLanguage') == 'it' ? 'selected' : '' }}>Italiano</option>
            <option value="fr" {{ session('lastLanguage') == 'fr' ? 'selected' : '' }}>Francese</option>
            <option value="en" {{ session('lastLanguage') == 'en' ? 'selected' : '' }}>Inglese</option>
        </select>
        <input type='submit' id='submit1' value='Cerca'>
    </form>