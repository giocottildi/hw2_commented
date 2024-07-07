<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class FaqSeeder extends Seeder
{
    public function run()
    {
        $faqs = [
            [
                'categoria' => 'CONDIZIONI PARTICOLARI DI VENDITA',
                'domanda' => 'QUANTO COSTA OGNI USCITA?',
                'risposta' => 'Se acquisterai la collezione in edicola, l\'importo di ogni uscita sarà:
                                Prezzo 1a uscita € 2,99
                                Prezzo uscite successive € 12,00 ciascuna (salvo variazione dell’aliquota fiscale)'
            ],
            [
                'categoria' => 'CONDIZIONI PARTICOLARI DI VENDITA',
                'domanda' => 'DA QUANTE USCITE È COMPOSTA LA COLLEZIONE?',
                'risposta' => 'L’intera collezione si compone di 60 uscite. 
                                L’Editore si riserva il diritto di variare la sequenza delle uscite dell’opera e/o i prodotti allegati. 
                                Qualsiasi variazione sarà comunicata nel rispetto delle norme vigenti previste dal Codice del Consumo (D.lgs 206/2005).'
            ],
            [
                'categoria' => 'ABBONAMENTO',
                'domanda' => 'COME FUNZIONA L’ABBONAMENTO E QUANTO COSTA?',
                'risposta' => 'Se ti ABBONI, riceverai direttamente al tuo domicilio un invio ogni mese circa. 
                                In caso di sottoscrizione di un abbonamento potrai interrompere gli invii in qualsiasi momento con una semplice comunicazione al Servizio Clienti. 
                                Si consiglia di indicare un indirizzo di spedizione presso il quale è possibile trovare qualcuno durante tutto l\'arco della giornata (ad esempio il posto di lavoro oppure casa di un familiare o di un conoscente). 
                                L’invio del 1° pacco avverrà entro un mese circa dall’attivazione dell’abbonamento. 
                                SPESE DI SPEDIZIONE GRATIS PER TUTTA LA COLLEZIONE SOLO SE TI ABBONI CON CARTA DI CREDITO O PAYPAL.'
            ],
            [
                'categoria' => 'ABBONAMENTO',
                'domanda' => 'Se ti abboni dalla 1a uscita:',
                'risposta' => 'Con il 1° invio riceverai l\'uscita 1 e 2 a solo € 9,99 anziché € 14,99. 
                                Con il 2° e 3° invio riceverai, ogni mese circa, 3 libri per ogni invio a € 12,00 ogni libro (+ € 1,00 di spese di spedizione per invio). 
                                Dal 4° al 16° invio riceverai, ogni mese circa, 4 libri per ogni invio a € 12,00 ogni libro (+ € 1,00 di spese di spedizione per invio).'
            ],
            [
                'categoria' => 'ABBONAMENTO',
                'domanda' => 'Se ti abboni dalla 2a uscita:',
                'risposta' => 'Con il 1° invio riceverai l\'uscita 2 e 3 a solo € 12,00 anziché € 24,00. 
                                Dal 2° al 4° invio riceverai, ogni mese circa, 3 libri per ogni invio a € 12,00 ogni libro (+ € 1,00 di spese di spedizione per invio). 
                                Dal 5° al 16° invio riceverai, ogni mese circa, 4 libri per ogni invio a € 12,00 ogni libro (+ € 1,00 di spese di spedizione per invio).'
            ],
            [
                'categoria' => 'ABBONAMENTO',
                'domanda' => 'Se ti abboni dalla 3a uscita:',
                'risposta' => 'Con il 1° invio riceverai l\'uscita 3 e 4 a solo € 12,00 anziché € 24,00. 
                                Con il 2° invio riceverai 2 libri a € 12,00 ogni libro (+ € 1,00 di spese di spedizione). 
                                Con il 3° e 4° invio riceverai, ogni mese circa, 3 libri per ogni invio a € 12,00 ogni libro (+ € 1,00 di spese di spedizione per invio). 
                                Dal 5° al 16° invio riceverai, ogni mese circa, 4 libri per ogni invio a € 12,00 ogni libro (+ € 1,00 di spese di spedizione per invio).'
            ],
            [
                'categoria' => 'ABBONAMENTO',
                'domanda' => 'Se ti abboni dalla 4a uscita:',
                'risposta' => 'Con il 1° invio riceverai l\'uscita 4 e 5 a solo € 12,00 anziché € 24,00. 
                                Con il 2° invio riceverai 3 libri a € 12,00 ogni libro (+ € 1,00 di spese di spedizione). 
                                Dal 3° al 15° invio riceverai, ogni mese circa, 4 libri per ogni invio a € 12,00 ogni libro (+ € 1,00 di spese di spedizione per invio). 
                                Spese di spedizione GRATIS per il primo invio.'
            ],
            [
                'categoria' => 'ABBONAMENTO',
                'domanda' => 'REGALI',
                'risposta' => 'In più, riceverai i seguenti regali: 
                                - con il 3° invio la pratica agenda da viaggio. 
                                - con il 6° invio cinque magnifiche stampe in Edizione limitata di grande formato con una selezione delle memorabili copertine dello Strand Magazine, la rivista mensile che pubblicava le avventure di Sherlock Holmes. Splendidamente stampate in carta Arena Natural Smooth di 200 gr e presentate in una elegante cartella. Misure: 297x420 
                                - a partire dal 10° invio riceverai 3 numeri della rivista STORICA National Geographic. Offerta valida solo per il territorio italiano fino al 31/04/2023 salvo accettazione dell’Editore, e fino ad esaurimento scorte.'
            ],
            [
                'categoria' => 'ABBONAMENTO',
                'domanda' => 'CON QUALE FREQUENZA RICEVERÒ I PACCHI?',
                'risposta' => 'Riceverai un invio ogni mese circa direttamente all’indirizzo che hai indicato al momento della sottoscrizione dell’abbonamento.'
            ],
            [
                'categoria' => 'Pagamento',
                'domanda' => 'COME AVVIENE IL PAGAMENTO?',
                'risposta' => 'Al momento della sottoscrizione dell\'abbonamento potrai scegliere la modalità di pagamento che ti risulta più comoda: 
                                - 1. Pagamento con carta di credito (Visa, Mastercard, American Express) o Paypal con addebito mensile. ATTENZIONE! non sono accettate le carte di Poste Italiane. 
                                Il pagamento con carta di credito è più conveniente perché permette di non pagare le commissioni applicate ai bollettini postali. 
                                Al momento della conferma dell\'acquisto effettueremo un test sul funzionamento della carta per verificare che sia attiva. 
                                Se il test risulterà positivo, al momento della spedizione sulla carta verrà effettuata la transazione dell\'importo indicato nell\'offerta. 
                                L\'importo relativo ad ogni invio sarà addebitato sulla carta sempre al momento della spedizione. 
                                SPESE DI SPEDIZIONE GRATIS PER TUTTA LA COLLEZIONE SOLO SE TI ABBONI CON CARTA DI CREDITO O PAYPAL. 
                                - 2. Pagamento posticipato con bollettini postali, che troverà allegati in ogni pacco. 
                                Il pagamento dovrà avvenire entro e non oltre la data di scadenza indicata sul bollettino.'
            ],
            [
                'categoria' => 'Diritto di Recesso',
                'domanda' => 'DIRITTO DI RECESSO',
                'risposta' => 'Puoi annullare l’abbonamento comunicandolo al Servizio Clienti. 
                                Ai sensi del Codice del Consumo, il diritto di recesso si applica solamente ai consumatori privati. 
                                Il diritto di recesso non si applica agli abbonamenti ordinati da aziende o professionisti. 
                                Per annullare l’abbonamento o richiedere ulteriori informazioni, contattare il Servizio Clienti.'
            ],
            [
                'categoria' => 'Contatti',
                'domanda' => 'COME POSSO CONTATTARE IL SERVIZIO CLIENTI?',
                'risposta' => 'Puoi contattare il nostro Servizio Clienti attraverso il numero telefonico 800-123-456 o inviando una email all’indirizzo info@collezionelibri.it.'
            ],
        ];

        // Insert data into the database
        foreach ($faqs as $faq) {
            DB::table('faqs')->insert([
                'categoria' => $faq['categoria'],
                'domanda' => $faq['domanda'],
                'risposta' => $faq['risposta'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
