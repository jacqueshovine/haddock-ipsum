<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{

    public function index()
    {
        return Word::all();
    }

    public function show($id)
    {
        return Word::find($id);
    }
}
