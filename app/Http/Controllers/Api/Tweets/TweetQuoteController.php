<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetRetweetsWereUpdated;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Tweets\TweetType;
use Illuminate\Http\Request;

class TweetQuoteController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    
    public function store(Request $request, Tweet $tweet)
    {
        $retweet = $request->user()->tweets()->create([
            'type' => TweetType::QUOTE,
            'body' => $request->body,
            'original_tweet_id' => $tweet->id
        ]);

        broadcast(new TweetWasCreated($retweet));
        broadcast(new TweetRetweetsWereUpdated($request->user(), $tweet));
    }
}
