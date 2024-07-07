
// Chiamata iniziale per ottenere i dati e popolare il contenitore delle FAQ
loadFaq();


// Funzione per ottenere i dati delle FAQ dal backend
function loadFaq() {
    fetchFaq().then(popolaFaq, erroreFetch);
}

// Funzione per ottenere i dati dal file PHP
function fetchFaq() {
    return fetch('/faq')
    .then(response => response.json(), erroreFetch);
}

// Funzione per gestire gli errori di fetch
function erroreFetch(error) {
    console.error('Errore nella fetch:', error);
}



// Funzione per popolare il contenitore con i dati
function popolaFaq(data) {
    const faqContainer = document.getElementById('all_faq');
    
    // Svuota il contenitore prima di popolarlo nuovamente
    faqContainer.innerHTML = '';

    data.forEach(faq => {
        const faqElement = resultFaq(faq);
        faqContainer.appendChild(faqElement);
    });
}


// Funzione per creare un elemento DOM per ogni FAQ
function resultFaq(faq) {
    const faqDiv = document.createElement('div');
    faqDiv.classList.add('faq-item');

    const question = document.createElement('h3');
    question.textContent = faq.domanda;

    const answer = document.createElement('p');
    answer.innerHTML = faq.risposta.replace(/\n/g, '<br>'); // Sostituisci ogni newline con <br>

    faqDiv.appendChild(question);
    faqDiv.appendChild(answer);

    return faqDiv;
}

