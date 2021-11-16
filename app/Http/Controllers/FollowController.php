<?php

namespace App\Http\Controllers;
use App\Notifications\FollowRecieved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class FollowController extends Controller
{
    //
    public function store(User $user){
        
        //have the auth user follow the user
        auth()->user()->toggleFollow($user);
        
        $follows = "unfollow";
        if(auth()->user()->isFollowing($user)){
            $follows="follow";
            
            $user->notify(new FollowRecieved(auth()->user()));
        }

        return view('profiles.show', [
            'user'=> $user,
            'tweets' => $user->tweets()->withLikes()->paginate(10),
            'notification' => $follows
            ]);
    }
}
