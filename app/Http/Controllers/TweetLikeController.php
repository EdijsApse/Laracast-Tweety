<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TweetLikeController extends Controller
{
    public function store(Tweet $tweet) {
        $tweet->like();
        return back();
    }

    public function destroy(Tweet $tweet) {
        $tweet->dislike();
        return back();
    }
}