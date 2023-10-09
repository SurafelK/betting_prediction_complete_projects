<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\DivisionsController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\LeaguesController;
use App\Http\Controllers\PredictionsController;
use App\Http\Controllers\TeamsController;
use App\Http\Middleware\IsAdmin;
use App\Models\Countries;
use GuzzleHttp\Promise\Create;
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


Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);




Route::prefix('admin')->middleware('auth:sanctum', 'isAdmin')->group( function()
{
    Route::post('/create-predictions', [PredictionsController::class,'create']);
    Route::post('/create-countries', [CountriesController::class,'create']);
    Route::post("/create-leagues", [LeaguesController::class,'create']);
    Route::post('/create-teamss', [TeamsController::class,'create']);
    Route::post('/create-games', [GamesController::class,'create']);
    Route::post('/register-admin', [AdminController::class,'register']);
});

Route::group(['middleware' => ['auth:sanctum']], function()
{
    Route::get('/get-games', [GamesController::class,'show']);
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/latest-games', [GamesController::class,'latest']);
   
});


