<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index()
    {

    }

    public function history()
    {
        return view('packages.index');
    }
}
