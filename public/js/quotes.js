
// Genera subito una quote all'avvio
generaQuotes();

setInterval(generaQuotes, 2500);



function generaQuotes() {
    fetchQuote().then(quote => {
        const randomText = document.querySelector('#random-quote h1');
        randomText.textContent = quote;
    });
}


function handleError(error) {
    console.error('Errore nel recupero della quote:', error);
    return 'Errore nel recupero della quote';
}

function fetchQuote() {
    return fetch('/random-quote')
        .then(response => {
            if (!response.ok) {
                return handleError('Errore nella risposta del server');
            }

            return response.json();
        }, handleError)
        
        .then(data => {
            if (data.quote && data.cit_quote) {
                return `${data.quote} ---- ${data.cit_quote}`;
            } else {
                return handleError('Quote non trovata');
            }
        }, handleError); 
}
