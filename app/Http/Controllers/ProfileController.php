<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
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
    public function edit(Request $request): View
    {
        $user = $request->user();

        if ($user->role === 'organizer') {
            return view('profile.organizer', compact('user'));
        } elseif ($user->role === 'attendee') {
            return view('profile.attendee', compact('user'));
        } else {
            return view('profile.default', compact('user'));
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

       
        // Redirect based on user role
        if ($user->role === 'organizer') {
            return Redirect::route('organizer.dashboard')->with('status', 'profile-updated');
        } elseif ($user->role === 'attendee') {
            return Redirect::route('attendee.dashboard')->with('status', 'profile-updated');
        } else {
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Display the user's profile.
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }
}
