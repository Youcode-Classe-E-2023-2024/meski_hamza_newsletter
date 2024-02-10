<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store() {
        $validated = request()->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'bio' => 'required|min:5|max:200'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        if(request()->hasFile('image')) {
            $imagePath = request()->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }
        User::create($validated);

        return redirect()->route('login');
    }

    public function login() {
        return view('auth.login');
    }

    public function authenticate(User $user) {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = request()->has('remember'); // Check if "Remember Me" checkbox is checked

        if(auth()->attempt($validated, $remember)) {
            request()->session()->regenerate();
            return redirect()->route('main');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'No matching user found the provided email and password'
        ]);
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('main');
    }
}
