// Gestione di apertura e chiusura MENU PER COLLEGAMENTI NELLA STESSA PAGINA

function unvediMenu(event)
{
    console.log('Chiudi menu');
    const chiudiMenu = event.currentTarget;
    chiudiMenu.removeEventListener('click', unvediMenu);

    const chiudiSubMenu = document.querySelector('#container-menu');

    chiudiSubMenu.classList.add('hidden');
    const apriMenu = document.querySelector('#menu img');
    apriMenu.addEventListener('click', vediMenu);
}



function vediMenu(event)
{
    console.log('Apri menu');
    const apriMenu = event.currentTarget;
    apriMenu.removeEventListener('click', vediMenu);

    const apriSubMenu = document.querySelector('#container-menu');

    apriSubMenu.classList.remove('hidden');
    const chiudiMenu = document.querySelector('#menu img');
    chiudiMenu.addEventListener('click', unvediMenu);
}
const apriMenu = document.querySelector('#menu img');
apriMenu.addEventListener('click', vediMenu);


// Gestione di apertura e chiusura MY ACCOUNT

function unvediMyAccount(event)
{
    console.log('Chiudi account');
    const chiudiMyAccount = event.currentTarget;
    chiudiMyAccount.removeEventListener('click', unvediMyAccount);

    const chiudiSubMyAccount = document.querySelector('#container-account');

    chiudiSubMyAccount.classList.add('hidden');
    const apriMyAccount = document.querySelector('#account h1');
    apriMyAccount.addEventListener('click', vediMyAccount);
}



function vediMyAccount(event)
{
    console.log('Apri account');
    const apriMyAccount = event.currentTarget;
    apriMyAccount.removeEventListener('click', vediMyAccount);

    const apriSubMyAccount = document.querySelector('#container-account');

    apriSubMyAccount.classList.remove('hidden');
    const chiudiMyAccount = document.querySelector('#account h1');
    chiudiMyAccount.addEventListener('click', unvediMyAccount);
}
const apriMyAccount = document.querySelector('#account h1');
apriMyAccount.addEventListener('click', vediMyAccount);


//Cambiamento dinamico dell'altezza dell'header

function headerDinamico() {
    const header = document.querySelector('header');
    const sh_img = document.querySelector('.flex-item2 a img');

    if (window.scrollY > 0) {
        header.classList.add('fixed');
        sh_img.classList.add('scrolled');
    } else {
        header.classList.remove('fixed');
        sh_img.classList.remove('scrolled');
    }
}

window.addEventListener('scroll', headerDinamico);



