<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetLikesWereUpdated;
use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetLikeController extends Controller
{
    public function store(Request $request, Tweet $tweet)
    {
        if($request->user()->hasLiked($tweet)){
            return response(null, 409);
        }

        $request->user()->likes()->create([
            'tweet_id' => $tweet->id
        ]);

        broadcast(new TweetLikesWereUpdated($request->user(), $tweet));
    }


    public function destroy(Request $request, Tweet $tweet)
    {
        $request->user()->likes->where('tweet_id', $tweet->id)->first()->delete();
    }
}
