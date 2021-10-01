<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetWasCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tweets\TweetStoreRequest;
use App\Http\Resources\TweetCollection;
use App\Http\Resources\TweetResource;
use App\Models\Tweet;
use App\Models\TweetMedia;
use App\Notifications\Tweets\TweetMentionedIn;
use App\Tweets\TweetType;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['store']);
    }


    public function index(Request $request)
    {
        $tweets = Tweet::with([
                'user',
                'likes',
                'originalTweet',
                'retweets',
                'replies',
                'media.baseMedia',
                'originalTweet.user',
                'originalTweet.likes',
                'originalTweet.retweets',
                'originalTweet.media.baseMedia'
            ])->find(explode(',', $request->ids));

        return new TweetCollection($tweets);
    }


    public function store(TweetStoreRequest $request)
    {
        //TODO: validate
        $tweet = $request->user()->tweets()->create(array_merge($request->only('body'), [
            'type' => TweetType::TWEET
        ]));

        foreach($request->media as $id) { 
            $tweet->media()->save(TweetMedia::find($id));
        }

        //dd($tweet->mentions->users());


        foreach($tweet->mentions->users() as $user) {
            if($request->user()->id !== $user->id){
                $user->notify(new TweetMentionedIn($request->user(), $tweet));
            }
        }


        broadcast(new TweetWasCreated($tweet));
    }


    public function show(Tweet $tweet)
    {
        return new TweetCollection(collect([$tweet])->merge($tweet->parents()));
    }
}
