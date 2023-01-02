<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class EntriesController extends Controller
{

    public function index()
    {
        return view('entries.index');
    }
}
