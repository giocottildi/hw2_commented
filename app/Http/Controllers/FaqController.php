<?php

namespace App\Http\Controllers;

use App\Models\Faq;


use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();

        // Esegui il dump dei dati per verificarli
        // dd($faqs);

        return response()->json($faqs);
    }
}
