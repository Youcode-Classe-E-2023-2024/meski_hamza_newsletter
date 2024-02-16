<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Hash;

use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        return view('profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    public function userInfoUpdate()
    {
        $validated = request()->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users,email'
        ]);

        auth()->user()->update($validated);
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function passwordUpdate() {
        request()->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check(request()->current_password, auth()->user()->password)) {
            return Redirect::back()->withErrors(['current_password' => 'The provided current password does not match your actual current password.'])->withInput();
        }

        auth()->user()->update([
            'password' => Hash::make(request()->password),
        ]);
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy()
    {
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
