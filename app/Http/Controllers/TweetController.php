<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TweetController extends Controller
{

    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store() {

        $tweet = new Tweet();

        $attributes = request()->validate([
            'body' => 'required|max:255',
            'image' => 'file'
        ]);
        
        if (request('image')) {
            $attributes['image'] = $tweet->storeImage(request('image'));
        }
        $attributes['user_id'] = auth()->user()->id;

        $tweet->create($attributes);

        return redirect()->route('home')->with('success', 'Tweet created!');
    }

    public function destroy(Tweet $tweet) {
        $tweet->remove();
        return back()->with('success', 'Tweet deleted!');
    }
}
