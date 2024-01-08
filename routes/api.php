<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy buildin g your API!
|
*/

Route::group(['middleware' => 'api'], function ($router) {

    Route::get('/', fn() => response()->json(['messege' => 'api barber home', 'status' => 'conected']));

    Route::fallback(function (){
        return response()->json(['message'=> 'Route not found', 'status' => 'connected']);
    });

    //Users
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    //Companies
    Route::resource('companies', CompanyController::class)->except(['create', 'edit']);

});

