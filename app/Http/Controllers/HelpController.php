<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\FAQ;

class HelpController extends Controller
{
    /**
     * Display the help view.
     */
    public function index(): View
    {
        return view('help', [
            'FAQList' => FAQ::$FAQList,
        ]);
    }
}
