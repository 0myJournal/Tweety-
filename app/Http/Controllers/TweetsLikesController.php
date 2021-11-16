<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\LikeRecieved;
use Illuminate\Support\Facades\Notification;
use App\Models\Tweet;

class TweetsLikesController extends Controller
{
    //
    public function store(Tweet $tweet){

        $tweet->like(auth()->user());
        $tweet->user->notify(new LikeRecieved(auth()->user(), $tweet));
        return back();
    }

    public function destroy(Tweet $tweet){
        $tweet->dislike(auth()->user());
        return back();
    }

}
