<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Tweet;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Notifications\Mention;
class TweetController extends Controller
{
    //
    public function store(){
        
        $attributes = request()->validate([
            'body' => 'required','max:255',
            'image' => 'image'
        ]); 

        $mentionsarr = array();
        $mention = "";
        $collect = false;
        $txt = $attributes['body']." ";
        for($i=0;$i<strlen($txt);$i++){
            if($collect){
                if($txt[$i]==" "){
                    array_push($mentionsarr, $mention);
                    $mention = "";
                    $collect = false;
                }
                else{
                    $mention = $mention.$txt[$i];
                }
            }
            if($txt[$i]=='@'){
                $collect=true;
            }
        }

        $tweet= "";

        if(request('image'))
        {
            $tweet = Tweet::create([
                'user_id' => auth()->user()->id,
                'body' => $attributes['body'],
                'image' => $attributes['image']->store('tweet_images')
            ]);
            
        }
        else{

            $tweet = Tweet::create([
                'user_id' => auth()->user()->id,
                'body' => $attributes['body']
            ]);
            
        }

        foreach($mentionsarr as $mention){
            $user = User::where('username', $mention)->first();
            if($user){
                $user->notify(new Mention(auth()->user(), $tweet));
            }
        }

        return view('tweets.index', [
            'tweets' => auth()->user()->timeline(),
            'notification' => 'Your Tweet Has Been Uploaded'
        ]);
    }

    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline(),
            'notification' => ''
        ]);
    }

    public function destroy(Tweet $tweet){
        if(auth()->user()->is($tweet->user)){
            $tweet->delete();
            return view('tweets.index', [
                'tweets' => auth()->user()->timeline(),
                'notification' => 'Your Tweet has been deleted'
            ]);
        }
    }

    public function show(Tweet $tweet){
        
        return view('singletweet',[
            'tweet' => $tweet->withLikes()->find($tweet->id),
        ]);
    }
}
