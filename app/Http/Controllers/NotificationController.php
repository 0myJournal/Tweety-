<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    //
    public function index($read=true){

        if($read){
            return view('notifications',[
                'notifications' => auth()->user()->unreadNotifications,
            ]);
        }
        else{
            return view('readNotifications',[
                'notifications' => auth()->user()->notifications,
            ]);
        }
        
    }

    public function indexRead(){

        return $this->index(false);
    }

    public function read(){
        auth()->user()->unreadNotifications->markAsRead();
        return back();
    }
}
