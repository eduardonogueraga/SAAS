<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetectionsController extends Controller
{
    public function index()
    {
        return view('detections.index');
    }
}
