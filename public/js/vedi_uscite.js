
// Chiamata iniziale per ottenere i dati e popolare il contenitore
loadLibri();

// Funzione per ottenere i dati dal file PHP
function loadLibri() {
    fetchLibri().then(popolaLibri, erroreFetch);
}

// Funzione per ottenere i dati dal file PHP
function fetchLibri() {
    return fetch('/titoli-libri')
        .then(response => response.json(), erroreFetch);
}

// Funzione per gestire gli errori di fetch
function erroreFetch(error) {
    console.error('Errore nella fetch:', error);
}

// Funzione per creare un elemento h1 con i dati del libro
function resultLibro(item) {

    const uscitaDiv = document.createElement('div');
    uscitaDiv.classList.add('uscita');

    const heading = document.createElement('h1');
    heading.textContent = `${item.numero_uscita}^Uscita:  "${item.titolo}" disponibile il: ${item.data_uscita_format}`;

    uscitaDiv.appendChild(heading);

    return uscitaDiv;
}

// Funzione per popolare il contenitore con i dati
function popolaLibri(data) {
    const container = document.getElementById('all_uscite');
    
    // Svuota il contenitore prima di popolarlo nuovamente
    container.innerHTML = '';

    data.forEach(item => {
        const heading = resultLibro(item);
        container.appendChild(heading);
    });
}

