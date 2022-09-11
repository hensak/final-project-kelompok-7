<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index(User $user) {
        $profile = $user->profile;
        // dd($profile);
        return view('page.profile.index', compact('profile'));
    }

    public function edit(User $user) {
        $profile = $user->profile;
        return view('page.profile.edit', compact('profile'));
    }

    public function update(Request $request, User $user) {
        // dd($request);
        // $profile = Profile::find($user->profile->id);
        $profile = $user->profile;
        $request->validate([
            'bio' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'umur' => ['required', 'numeric'],
            'alamat' => ['required', 'string', 'max:255'],
        ]);

        $profile->email = $request->email;
        $profile->bio = $request->bio;
        $profile->umur = $request->umur;
        $profile->alamat = $request->alamat;
        $profile->save();
        Alert::success('Success', 'Your profile has been updated!');
        return view('profile.index', compact('profile'));
    }
}
