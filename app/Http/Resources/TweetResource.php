<?php

namespace App\Http\Resources;

use App\Http\Resources\TweetResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class TweetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'type' => $this->type,
            'original_tweet' => new TweetResource($this->originalTweet),
            'likes_count' => $this->likes->count(),
            'retweets_count' => $this->retweets->count(),
            'user' => new UserResource($this->user),
            'media' => new MediaCollection($this->media),
            'created_at' => optional($this->created_at)->timestamp,
        ];
    }
}
