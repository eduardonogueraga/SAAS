<?php

namespace App\Http\Controllers;

use App\Models\Package;
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

    public function showInHistory(Package $package)
    {
        return view('data.packages.show', ['id' => '0'.$package->id]);
    }
}
