
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

document.getElementById('search-form').addEventListener('submit', fetchSearch);

function fetchSearch(event) {
    event.preventDefault();
    const searchQuery = document.getElementById('search-input').value;
    fetch(`/ricercaOL?search=${encodeURIComponent(searchQuery)}`)
        .then(response => response.json())
        .then(onJson, erroreFetch); 
}

function erroreFetch(error) {
    console.error('Errore nella fetch:', error);
}


function onJson(data) {
    const container = document.getElementById('results-container');
    const resultTitle = document.getElementById('result-title');
    container.innerHTML = '';
    const searchQuery = document.getElementById('search-input').value;
    resultTitle.textContent = `Risultati della ricerca per: "${searchQuery}"`;

    if (data.docs && data.docs.length > 0) {
        data.docs.forEach((book, index) => {
            const bookDiv = document.createElement('div');
            bookDiv.classList.add('libri');

            if (book.cover_i) {
                const img = document.createElement('img');
                img.src = `https://covers.openlibrary.org/b/id/${book.cover_i}-M.jpg`;
                img.alt = `Copertina di ${book.title_suggest}`;
                img.classList.add('book-cover'); // Aggiungi classe per lo stile CSS
                bookDiv.appendChild(img);
            }

            const title = document.createElement('h1');
            title.textContent = book.title_suggest;
            title.style.cursor = 'pointer'; // Aggiungi stile per il cursore
            title.addEventListener('click', () => openModal(book.title_suggest, `https://covers.openlibrary.org/b/id/${book.cover_i}-M.jpg`, book.author_name ? book.author_name.join(', ') : 'Non disponibile', book.first_publish_year || 'Non disponibile')); // Evento di click sul titolo
            bookDiv.appendChild(title);

            // Immagine per il salvataggio
            const saveImgUrl = '/img/save.png';
            const saveImg = document.createElement('img');
            saveImg.classList.add('img-salva');
            saveImg.id = `save-img-${index}`;
            saveImg.src = saveImgUrl;


            // chiamata a handleSaveClick per chiamare toggleSaveBook dentro la funzione onJson
            saveImg.onclick = () => handleSaveClick(book.title_suggest, book.cover_i, book.author_name ? book.author_name.join(', ') : 'Non disponibile', book.first_publish_year || 'Non disponibile', saveImg);


            bookDiv.appendChild(saveImg);

            container.appendChild(bookDiv);


            function handleSaveClick(title, coverId, author, publishYear, saveImg) {
                console.log(`Title: ${title}, Publish Year: ${publishYear}`);
                toggleSaveBook(title, coverId, author, publishYear, saveImg);
            }
            
        });
    } else {
        const noResult = document.createElement('h1');
        noResult.textContent = 'Nessun risultato trovato.';
        container.appendChild(noResult);
    }


}

function openModal(title, coverUrl, author, publishYear) {
    const modal = document.createElement('div');
    modal.classList.add('modal');

    const modalContent = document.createElement('div');
    modalContent.classList.add('modal-content');

    const closeModalBtn = document.createElement('span');
    closeModalBtn.classList.add('close');
    closeModalBtn.innerHTML = '&times;';
    closeModalBtn.onclick = closeModalHandler; // Usa la funzione di gestione definita

    modalContent.appendChild(closeModalBtn);

    // Parte sinistra della modal (titolo e copertina)
    const leftContainer = document.createElement('div');
    leftContainer.classList.add('left-container');
 
    const titleHeader = document.createElement('h2');
    titleHeader.textContent = title;
    leftContainer.appendChild(titleHeader);

    const coverImg = document.createElement('img');
    coverImg.src = coverUrl;
    coverImg.alt = `Copertina di ${title}`;
    leftContainer.appendChild(coverImg);


    modalContent.appendChild(leftContainer);

    // Parte destra della modal (autore e data di pubblicazione)
    const rightContainer = document.createElement('div');
    rightContainer.classList.add('right-container');

    const authorInfo = document.createElement('p');
    authorInfo.textContent = `Autore: ${author}`;
    rightContainer.appendChild(authorInfo);

    const publishDate = document.createElement('p');
    publishDate.textContent = `Data di pubblicazione: ${publishYear}`;
    rightContainer.appendChild(publishDate);

    modalContent.appendChild(rightContainer);

    modal.appendChild(modalContent);

    document.body.appendChild(modal);
    console.log("Modal aperta");

    // Aggiungi gestore di eventi per chiudere la modale cliccando fuori di essa
    window.addEventListener('click', outsideClickHandler);

    function closeModalHandler() {
        console.log("Chiudi pulsante cliccato");
        closeModal(modal);
    }



    function closeModal(modal) {
        console.log("Chiudere la modale");
        modal.classList.add('hidden');
        console.log(modal.classList);
        // Rimuovi il gestore di eventi una volta chiusa la modale
        window.removeEventListener('click', outsideClickHandler);

        // // Rimuovi la modale dal DOM dopo una breve attesa per assicurarsi che le transizioni CSS siano completate
        // setTimeout(() => {
            // document.body.removeChild(modal);
        // }, 0);
    }
    
    function outsideClickHandler(event) {
        if (event.target === modal) {
            console.log("Clic fuori dalla modale");
            closeModal(modal);
        }
    }
}








function toggleSaveBook(title, cover_id, author, publishYear, saveImg) {

    if (!saveImg || !saveImg.src) {
    console.error('Impossibile accedere alla proprietà src di saveImg');
    return;
    }

    const isSaved = saveImg.src.includes('/saved.png');
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

