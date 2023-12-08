<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{

    public function profile()
    {
        return $this->show(auth()->user());
    }

    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);

        return view('users.show', compact('user', 'ideas'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $ideas = $user->ideas()->paginate(5);

        return view('users.edit', compact('user', 'ideas'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        if($request('image')){
            $imagePath = $request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }


        $user->update($validated);

        return redirect()->route('profile')->with('success', 'User profile updated successfully!');
    }
}
