<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Esempio di dati da inserire
        $quotes = [

            ['actual_quote' => 'Ciò che un uomo può inventare, un altro può scoprire.', 'quote_cit' => '(da L`avventura degli omini danzanti)'],
            ['actual_quote' => 'Da molto tempo il mio assioma è che le piccole cose sono di gran lunga le più importanti.', 'quote_cit' => '(da Un caso di identità)'],
            ['actual_quote' => 'È un errore enorme teorizzare a vuoto. Senza accorgersene, si comincia a deformare i fatti per adattarli alle teorie, anziché il viceversa.', 'quote_cit' => '(da Uno scandalo in Boemia)'],
            ['actual_quote' => 'È un errore confondere ciò che è strano con ciò che è misterioso. Spesso, il delitto più banale è il più incomprensibile proprio perché non presenta aspetti insoliti o particolari, da cui si possono trarre delle deduzioni.', 'quote_cit' => '(da Uno studio in rosso)'],
            ['actual_quote' => 'Eliminato l`impossibile, ciò che resta, per quanto improbabile sia, deve essere la verità.', 'quote_cit' => '(da Il segno dei quattro)'],
            ['actual_quote' => 'Il modo migliore per recitare una parte è quello di viverla.', 'quote_cit' => '(da L`avventura del detective morente)'],
            ['actual_quote' => 'Il mondo è pieno di cose ovvie che nessuno si prende mai la cura di osservare.', 'quote_cit' => '(da Il mastino dei Baskerville)'],
            ['actual_quote' => 'Il tocco supremo dell`artista – sapere quando fermarsi.', 'quote_cit' => '(da L`avventura del costruttore di Norwood)'],
            ['actual_quote' => 'La mia vita non è che un continuo sforzo per sfuggire alla banalità dell`esistenza.', 'quote_cit' => '(da La lega dei capelli rossi)'],
            ['actual_quote' => 'La prova principale della vera grandezza di un uomo è la sua percezione della propria piccolezza.', 'quote_cit' => '(da Il segno dei quattro)'],
            ['actual_quote' => 'Nella matassa incolore della vita scorre il filo rosso del delitto, e il nostro compito sta nel dipanarlo, nell`isolarlo, nell`esporne ogni pollice.', 'quote_cit' => '(da Uno studio in rosso)'],
            ['actual_quote' => 'Non faccio mai eccezioni. Un`eccezione contraddice la regola.', 'quote_cit' => '(da Il segno dei quattro)'],
            ['actual_quote' => 'Non posso vivere se non faccio lavorare il cervello. Quale altro scopo c`è nella vita?', 'quote_cit' => '(da Il segno dei quattro)'],
            ['actual_quote' => 'Non sono fra coloro che considerano la modestia una virtù. Per un uomo dotato di logica, tutte le cose andrebbero viste esattamente come sono, e sottovalutare se stessi significa allontanarsi dalla verità almeno quanto sopravvalutare le proprie doti.', 'quote_cit' => '(da L`interprete greco)'],
            ['actual_quote' => 'Nulla è più innaturale dell`ovvio.', 'quote_cit' => '(da Il segno dei quattro)'],
            ['actual_quote' => 'Quella dell`investigazione è, o dovrebbe essere, una scienza esatta e andrebbe quindi trattata in maniera fredda e distaccata.', 'quote_cit' => '(da Il segno dei quattro)'],
            ['actual_quote' => 'Sono proprio le soluzioni più semplici quelle che in genere vengono trascurate.', 'quote_cit' => '(da Il segno dei quattro)'],
            ['actual_quote' => 'Tutto ciò che non è noto appare straordinario.', 'quote_cit' => '(da Il mastino dei Baskerville)'],
            ['actual_quote' => 'Una deduzione giusta ne suggerisce invariabilmente altre.', 'quote_cit' => '(da Silver Blaze)']
        ];

        DB::table('quotes')->insert($quotes);
    }
}


