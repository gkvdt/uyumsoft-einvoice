<?php

use App\ClientDetails;
use App\Http\Controllers\Api\ApiController;
use App\User;
use Illuminate\Http\Request;

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

Route::middleware('auth:sanctum')->get('/einvoice', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/login', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function () {

        $user = Auth::user();
        return $user;
    });

    Route::get('/details', [ApiController::class, 'details']);
    Route::get('/sales', [ApiController::class, 'sales']);
});
Route::post('/login', [ApiController::class, 'login']);
