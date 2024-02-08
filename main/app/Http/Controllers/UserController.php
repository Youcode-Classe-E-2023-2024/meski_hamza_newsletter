<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $products = $user->products()->latest()->get();
        return view('users.show', compact('user', 'products'));
    }

    public function profile(User $user) {
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) {
        $profile_editing = true;
        $products = $user->products()->latest()->get();
        return view('users.show', compact('user', 'products', 'profile_editing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validated = request()->validate([
            'name' => 'required|min:5|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'bio' => 'required|min:5|max:200'
        ]);

        if(request()->hasFile('image')) {
            $imagePath = request()->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        $user->update($validated);

        return redirect()->route('users.show', $user->id);
    }

}
