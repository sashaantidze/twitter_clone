<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Tweet;
use App\Models\TweetMedia;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Tweet extends Model
{
    use HasFactory;

    //protected $fillable = ['body'];

    protected $guarded = null;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeParent(Builder $builder)
    {
        return $builder->whereNull('parent_id');
    }


    public function originalTweet()
    {
        return $this->hasOne(Tweet::class, 'id', 'original_tweet_id');
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function retweets()
    {
        return $this->hasMany(Tweet::class, 'original_tweet_id');
    }


    public function retweetedTweet()
    {
        return $this->hasOne(Tweet::class, 'original_tweet_id', 'id');
    }


    public function media()
    {
        return $this->hasMany(TweetMedia::class);
    }


    public function replies()
    {
        return $this->hasMany(Tweet::class, 'parent_id');
    }

}
