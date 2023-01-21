<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePackageRequest;
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
        return view('data.packages.show', ['id' => '00000000'.$package->id]);
    }

    public function createPackage(CreatePackageRequest $request)
    {
        return $request->createNewPackage();
    }
}
