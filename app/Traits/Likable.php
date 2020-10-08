<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Like;
use App\User;

trait Likable
{

    public function scopeWithLikes(Builder $query) {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function like($liked = true) {

        if ($this->isLikedBy(auth()->user(), $liked)) {
            $this->likes()->where(['tweet_id'=> $this->id, 'user_id' => auth()->id()])->delete();
        } else {
            $this->likes()->updateOrCreate([
                'user_id' => auth()->id()
            ],
            [
                'liked' => $liked
            ]);
        }
    }

    public function dislike() {
        $this->like(false);
    }

    public function isLikedBy(User $user, $liked = true) {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', $liked)->count();
    }
}
