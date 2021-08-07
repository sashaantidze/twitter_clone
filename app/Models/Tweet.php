<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    //protected $fillable = ['body'];

    protected $guarded = null;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function originalTweet()
    {
        return $this->hasOne(Tweet::class, 'id', 'original_tweet_id');
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
