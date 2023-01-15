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
        return view('data.packages.show', ['id' => '0'.$package->id]);
    }

    public function createPackage(CreatePackageRequest $request)
    {
        $response = [];

        if($request->createNewPackage()){
            $response["status"] = "200";
            $response["msg"] = "Paquete instalado OK";

        }else {
            $response["status"] = "400";
            $response["msg"] = "Error al instalar el paquete";
        }

        return $response;
    }
}
