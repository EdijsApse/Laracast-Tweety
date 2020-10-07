<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;

class ProfileController extends Controller
{
    public function show(User $user) {
        return view('profile.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(6)
        ]);
    }

    public function edit(User $user) {

        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user) {
        $attributes = request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user)
            ],
            'name' => [
                'string',
                'required',
                'max:255'
            ],
            'avatar' => [
                'file'
            ],
            'email' => [
                'string',
                'required',
                'max:255',
                'email',
                Rule::unique('users')->ignore($user)
            ],
            'password' => [
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed'
            ]
        ]);
        
        if(request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect($user->profileLink());
    }
}
