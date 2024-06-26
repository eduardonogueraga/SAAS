<?php

use App\Http\Controllers\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    $user = User::find(1);
    $user->tokens()->delete();


    $token = $user->createToken($request->device_name)->plainTextToken;
    $token = openssl_encrypt($token, env('CIPHER'), env('AES_KEY'), 0, hex2bin(env('IV_HEX')));
    return response($token)->header('Content-Type', 'text/plain');
});

Route::get('/unixtime/get/', [DataController::class, 'getUnixTime']);
Route::middleware('auth:sanctum')->get('/package/get/', [DataController::class, 'getLastPackageId']);
Route::middleware('auth:sanctum')->post('/package/new/', [DataController::class, 'createPackage']);
Route::middleware('auth:sanctum')->post('/notice/new/', [DataController::class, 'createSystemNotification']);

