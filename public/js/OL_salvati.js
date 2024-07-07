const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


fetchSavedBooks();

function fetchSavedBooks() {
    fetch('/select-save-book')
        .then(response => response.json())
        .then(onJson, erroreFetch);
}

function erroreFetch(error) {
    console.log('Errore nella fetch:', error);
    alert('Errore nella richiesta di salvataggio/rimozione del libro');
}

function onJson(data) {
    const container = document.getElementById('saved-results-container');
    if (data.success) {
        data.books.forEach((book, index) => {
            const bookDiv = document.createElement('div');
            bookDiv.classList.add('libri');

            if (book.cover_id) {
                const img = document.createElement('img');
                img.src = `https://covers.openlibrary.org/b/id/${book.cover_id}-M.jpg`;
                img.alt = `Copertina di ${book.title}`;
                bookDiv.appendChild(img);
            }

            const titleSpan = document.createElement('span');
            titleSpan.textContent = book.title;
            titleSpan.classList.add('book-title');
            titleSpan.onclick = () => openModal(book);

            const title = document.createElement('h1');
            title.appendChild(titleSpan);
            bookDiv.appendChild(title);

            // Immagine per il salvataggio
            const saveImgUrl = '/img/saved.png';
            const saveImg = document.createElement('img');
            saveImg.classList.add('img-salva');
            saveImg.dataset.title = book.title; // Salva il titolo del libro come attributo personalizzato
            saveImg.dataset.coverId = book.cover_id; // Salva l'id della copertina come attributo personalizzato
            saveImg.dataset.author = book.autore; // Salva l'autore come attributo personalizzato
            saveImg.dataset.publishYear = book.anno_pubblicazione; // Salva l'anno di pubblicazione come attributo personalizzato
            saveImg.src = saveImgUrl;
            saveImg.onclick = () => toggleSaveBook(book.title, book.cover_id, book.autore, book.anno_pubblicazione, saveImg);
            bookDiv.appendChild(saveImg);

            container.appendChild(bookDiv);
        });
    } else {
        const noResult = document.createElement('h1');
        noResult.textContent = 'Nessun libro salvato trovato.';
        container.appendChild(noResult);
    }
}

let currentModal = null;

function openModal(book) {
    // Creare la modale
    const modal = document.createElement('div');
    modal.classList.add('modal');

    const content = document.createElement('div');
    content.classList.add('modal-content');

    // Titolo del libro nella modale
    const modalTitle = document.createElement('h2');
    modalTitle.textContent = book.title;
    content.appendChild(modalTitle);

    // Immagine di copertina del libro nella modale
    if (book.cover_id) {
        const img = document.createElement('img');
        img.src = `https://covers.openlibrary.org/b/id/${book.cover_id}-M.jpg`;
        img.alt = `Copertina di ${book.title}`;
        content.appendChild(img);
    }

    // Autore del libro nella modale
    const author = document.createElement('p');
    author.textContent = `Autore: ${book.autore}`;
    content.appendChild(author);

    // Anno di pubblicazione del libro nella modale
    const year = document.createElement('p');
    year.textContent = `Anno di pubblicazione: ${book.anno_pubblicazione}`;
    content.appendChild(year);

    modal.appendChild(content);

    // Aggiungere la modale al body del documento
    document.body.appendChild(modal);

    // Memorizza il riferimento alla modale corrente
    currentModal = modal;

    // Chiudere la modale cliccando fuori dal contenuto
    window.addEventListener('click', closeModal);
}

function closeModal(event) {
    if (!currentModal) return;
    
    if (event.target === currentModal) {
        currentModal.classList.add('hidden');
        // Rimuovi il gestore di eventi una volta chiusa la modale
        window.removeEventListener('click', closeModal);
        currentModal = null;
    }
}




function toggleSaveBook(title, cover_id, author, publishYear, saveImg) {
    if (!saveImg || !saveImg.src) {
        console.log('Impossibile accedere alla proprietà src di saveImg');
        return;
    }

    const isSaved = saveImg.src.includes('saved.png');
    const url = isSaved ? '/delete-save-book' : '/add-save-book';

    const bookDetails = {
        title,
        cover_id,
        author,
        publishYear,
        isSaved
    };

    console.log('Saving book with details:', bookDetails);

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify(bookDetails)
    })
    .then(response => response.json())
    .then(data => {
        console.log('Parsed JSON response:', data);
        if (data.success) {
            const saveImgUrl = isSaved ? '/img/save.png' : '/img/saved.png';
            console.log(isSaved ? 'rimosso' : 'salvato');
            saveImg.src = saveImgUrl;
        } else {
            alert('Errore nella richiesta: ' + data.message);
        }
    }, erroreFetch);
}

