<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\Models\User;
 
class ProfilesController extends Controller
{
    //
    public function show(User $user){
        return view('profiles.show', [
            'user'=> $user,
            'tweets' => $user->tweets()->withLikes()->paginate(10),
            'notification' => ''
            ]);
    }

    public function edit(User $user){
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
        
        $attributes = request()->validate([
            'avatar'=> [
                'file'
            ],
            'banner'=> [
                'file'
            ],
            'username' => [
                'string', 'required', 
                'max:255', 
                'alpha_dash',
                Rule::unique('users')->ignore($user)
            ],
            'bio' =>[
                'max:255',
                'string',
            ],
            'name' => [
                'string',
                'required',
                'max:255'
            ],

            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user)
            ],

            'password' => [
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed'
            ],
        ]);

        
        if(request('avatar'))
        {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        if(request('banner'))
        {
            $attributes['banner'] = request('banner')->store('banners');
        }

        
        $user->update($attributes);
        return redirect($user->path());
    }


}
