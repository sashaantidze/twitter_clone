<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use App\Http\Resources\TweetCollection;
use App\Models\User;
use Illuminate\Http\Request;

class TimelineController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }


    public function index (Request $request)
    {
        $this->tests();

        $tweets = $request->user()
            ->tweetsFromFollowing()
            ->parent()
            ->latest()
            ->with([
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
            ])
            ->paginate(8);

        return new TweetCollection($tweets);
    }


    protected function tests()
    {

        // GET GIVEN USERS FOLLOWERS 
        //$follower_ids = auth()->user()->followers()->pluck('users.id')->toArray();
        //dump($follower_ids);

        // GET USERS FROM FOLLOWERS THAT GIVEN USER IS FOLLOWING BACK
        //$followed_back = auth()->user()->isFollowing($follower_ids)->pluck('id')->toArray();
        //dump($followed_back);

        // GET USERS THAT ARE NOT BEING FOLLOWED BACK (follow requests list)
        //dump(array_diff($follower_ids, $followed_back));


        //COMPARE EITHER COLLECTIONS OR ARRAYS, YOU DECIDE! DON'T USE CODE ABOVE, IT'S CRAP. DON'T REMOVE YET THO
        $followers = auth()->user()->followers;
        dump($followers);

        $following = auth()->user()->following;
        dump($following);


        dump($followers->diff($following));
        //dump(array_diff($followers, $following));
    }
}
