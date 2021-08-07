<?php

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

Route::get('/timeline', 'App\Http\Controllers\Api\Timeline\TimelineController@index');
Route::post('/tweets', 'App\Http\Controllers\Api\Tweets\TweetController@store');
Route::post('/tweets/{tweet}/likes', 'App\Http\Controllers\Api\Tweets\TweetLikeController@store');
Route::delete('/tweets/{tweet}/likes', 'App\Http\Controllers\Api\Tweets\TweetLikeController@destroy');
