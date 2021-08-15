<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetRetweetsWereUpdated;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Tweets\TweetType;
use Illuminate\Http\Request;

class TweetRetweetController extends Controller
{
    public function store(Request $request, Tweet $tweet)
    {
        $retweet = $request->user()->tweets()->create([
            'type' => TweetType::RETWEET,
            'original_tweet_id' => $tweet->id
        ]);

        broadcast(new TweetWasCreated($retweet));
        broadcast(new TweetRetweetsWereUpdated($request->user(), $tweet));
    }


    public function destroy(Request $request, Tweet $tweet)
    {
        $tweet->retweetedTweet()->where('user_id', $request->user()->id)->delete();
    }
}
