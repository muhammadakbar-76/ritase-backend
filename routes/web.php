<?php

use App\Http\Controllers\UnitController;
use App\Models\Ritase;
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
    return view('welcome', [
        'title' => 'Welcome Page'
    ]);
});

Route::resource('/units', UnitController::class)->except('show');

Route::get('ritase', function () {
    return view('ritase', [
        'title' => 'Ritases',
        'ritases' => Ritase::paginate(5),
    ]);
});
