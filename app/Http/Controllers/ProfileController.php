<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class ProfileController extends Controller
{



    public function index()
    {

        $user = Auth::user(); //ophalen ingelogde gebruiker
        return view('profile.index', ['user' => $user]); //gebruiker meegeven aan view
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function show($id)
{
    $user = User::findOrFail($id);

    return view('profile.index', ['user' => $user]);
}


    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();

        return Redirect::route('profile.edit')->with('status', 'password-updated');
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

        return Redirect::to('/login.index')->with('status', 'account-deleted');
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'like', "%{$query}%")->get();
        $user = Auth::user();
        return view('profile.search', ['users' => $users , 'user'=> $user]);
    }

}
