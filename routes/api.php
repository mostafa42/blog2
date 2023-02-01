<?php

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\User\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('create-account' , [AuthController::class , "create_account"]);

Route::post('login', [AuthController::class ,'login']);
Route::get('logout', [AuthController::class ,'logout']);

Route::middleware('auth:sanctum')->group( function () {
    
    Route::get('logout', [AuthController::class ,'logout']);

});

Route::get('get-document/{document_id}' , [HomeController::class , "get_document"]);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
