<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(){
        return view('manages-user.profile', [
            'user' => Auth::user(),
            'title' => 'Profile',
        ]);
    }
    public function edit(Request $request): View
    {
        return view('manages-user.edit-profile', [
            'title' => 'Edit Profile',
            'user' => $request->user(),
        ]);
    }
    public function update_profile(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username,' . Auth::user()->id,
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $validatedData = $request->validate($rules);
        $user = User::find(Auth::user()->id);

        // Update individual attributes
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];

        // Update avatar if provided
        if ($request->hasFile('avatar')) {
            // Store the file in the 'user-avatars' directory within the storage disk
            $user->avatar = $request->file('avatar')->store('user-avatars', 'public');
        }

        $user->save();

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }
}