<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AjaxController extends Controller
{
    //
    public function listen($letter){

        $userarr = array();
        //return user where letter like $letter
        $users = User::where('username', 'like', $letter.'%');
        return json_encode($users->get());
    }
}
