<?php

use App\Http\Controllers\Api\Timeline\TimelineController;
use Illuminate\Http\Request;
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
});

Route::get('/home', function (Request $request) {
    //dd($request->user()->tweetsFromFollowing);
    return view('home');
})->middleware(['auth:sanctum'])->name('home');

//Route::get('/api/timeline', 'App\Http\Controllers\Api\Timeline\TimelineController@index');

require __DIR__.'/auth.php';
