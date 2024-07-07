<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function getRandomQuote()
    {
        $quote = Quote::inRandomOrder()->first();

        if ($quote) {
            return response()->json([
                'quote' => $quote->actual_quote,
                'cit_quote' => $quote->quote_cit
            ]);
        } else {
            return response()->json([
                'error' => 'Quote non trovata'
            ]);
        }
    }


}
