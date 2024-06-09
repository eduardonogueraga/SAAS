<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePackageRequest;
use App\Http\Requests\CreateSystemNoticeRequest;
use App\Models\Package;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    public function createSystemNotification(CreateSystemNoticeRequest $request)
    {
        return $request->createNewSystemNotification();
    }
    public function getLastPackageId()
    {
        $maxId = Package::max('id');
        $maxId = openssl_encrypt($maxId, env('CIPHER'), env('AES_KEY'), 0, hex2bin(env('IV_HEX')));
        return response($maxId)->header('Content-Type', 'text/plain');
    }
    public function getUnixTime(){
        return response(Carbon::now()->format('Y;m;d;H;i;s'))->header('Content-Type', 'text/plain');
    }
}
