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
Route::get('/media/types', 'App\Http\Controllers\Api\Media\MediaTypesController@index');
Route::get('/tweets', 'App\Http\Controllers\Api\Tweets\TweetController@index');
Route::get('/tweets/{tweet}', 'App\Http\Controllers\Api\Tweets\TweetController@show');
Route::get('/tweets/{tweet}/replies', 'App\Http\Controllers\Api\Tweets\TweetReplyController@show');

Route::post('/tweets', 'App\Http\Controllers\Api\Tweets\TweetController@store');
Route::post('/tweets/{tweet}/likes', 'App\Http\Controllers\Api\Tweets\TweetLikeController@store');
Route::post('/tweets/{tweet}/replies', 'App\Http\Controllers\Api\Tweets\TweetReplyController@store');
Route::post('/tweets/{tweet}/retweets', 'App\Http\Controllers\Api\Tweets\TweetRetweetController@store');
Route::post('/tweets/{tweet}/quotes', 'App\Http\Controllers\Api\Tweets\TweetQuoteController@store');
Route::post('/media', 'App\Http\Controllers\Api\Media\MediaController@store');

Route::delete('/tweets/{tweet}/likes', 'App\Http\Controllers\Api\Tweets\TweetLikeController@destroy');
Route::delete('/tweets/{tweet}/retweets', 'App\Http\Controllers\Api\Tweets\TweetRetweetController@destroy');




