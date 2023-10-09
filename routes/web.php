<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\LeaguesController;
use App\Http\Controllers\PredictionsController;
use App\Http\Controllers\TeamsController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('wellcome');


Route::post('/login', [AuthController::class, 'loginn'])->name('loginn');
Route::get('/register',[AuthController::class,'registerationform'])->name('register');
Route::post('/register/user', [AuthController::class, 'registerweb'])->name('userregister');

// Route::group(function()
// {
//     Route::get('/games', [GamesController::class,'index'])->name('home.page');
//     Route::post('/logout', [AuthController::class,'destroy'])->name('logout');
// })->middleware(Authenticate::class);

Route::group(['middleware' => ['auth']], function()
{
    Route::get('/games', [GamesController::class,'index'])->name('home.page');
    Route::post('/logout', [AuthController::class,'destroy'])->name('logout');
});

Route::group(['middleware' => ['auth','isAdmin']],function()
{
    Route::get('/admin',[AdminController::class,'adminPanel'])->name('admin.page');
    Route::post('/admin/create-countries', [CountriesController::class,'store'])->name('create.country');
    Route::post('/admin/create-league', [LeaguesController::class, 'store'])->name('create.league');
    Route::post('/admin/create-prediction',[PredictionsController::class, 'store'])->name('create.prediction');
    Route::post('/admin/create-teams', [TeamsController::class,'store'])->name('create.teams');
    Route::put('/team/{id}', [TeamsController::class,'update'])->name('games.update');

    // Teams
    Route::get('/admin/team', [TeamsController::class, 'editView'])->name('team.edit.view');
    Route::get('/admin/teams/{id}/edit', [TeamsController::class, 'update'])->name('teams.edit');
    Route::delete('/admin/teams/{id}', [TeamsController::class,'deleteTeam'])->name('teams.destroy');

    // Country
    Route::get('/admin/country', [CountriesController::class, 'editView'])->name('country.edit.view');
    Route::get('/admin/country/{id}/edit', [CountriesController::class, 'update'])->name('country.edit');
    Route::delete('/admin/country/{id}', [CountriesController::class,'deleteCountry'])->name('country.destroy');

    // Games

    Route::post('/admin/games', [GamesController::class, 'store'])->name('create.games');
    Route::get('/admin/games', [GamesController::class, 'editView'])->name('game.edit.view');
    Route::delete('/admin/game/{id}', [GamesController::class,'deleteGame'])->name('game.destroy');
}  );