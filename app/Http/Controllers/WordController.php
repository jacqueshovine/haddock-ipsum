<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{

    public function index()
    {
        return view('index', [
            'words' => Word::all(),
        ]);
    }
}
