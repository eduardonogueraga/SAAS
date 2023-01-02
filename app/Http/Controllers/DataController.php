<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        return view('data.index');
    }

    public function history()
    {
        return view('data.packages.index');
    }
}
