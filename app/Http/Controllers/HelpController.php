<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Faq;

class HelpController extends Controller {
    /**
     * Display the help view.
     */
    public function index(): View {
        return view('help', [
            'FaqList' => Faq::all(),
        ]);
    }
}
