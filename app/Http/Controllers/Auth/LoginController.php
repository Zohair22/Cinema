<?php

namespace App\Http\Controllers\Auth;

use App\Models\Location;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class LoginController
{
    public function create() : Response
    {
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();
        if (isset($user)
            && Hash::check(
                $credentials['password'],
                $user->password
            )
        ) {
            auth()->login($user);
            $request->session()->regenerate();
            return redirect('/homepage');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register() : Response
    {
        return Inertia::render('Auth/Register', [
            'locations' => Location::latest()->get(),
            'users' => User::latest()->get(),
        ]);
    }

    public function signup(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'name' => ['string', 'required', 'max:255', 'min:5'],
            'email' => ['email', 'required', 'max:255', Rule::unique('users','email')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $credentials['password'] = Hash::make($credentials['password']);
        User::create($credentials);
        return redirect('/newAdmin')->with(['success' => 'User Added Successfully']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user === auth()->user()){
            Auth::logout();
            $user->delete();
            return redirect('/login')->with(['success' => 'User Deleted Successfully']);
        }
        $user->delete();
        return back()->with(['success' => 'User Deleted Successfully']);
    }
}
