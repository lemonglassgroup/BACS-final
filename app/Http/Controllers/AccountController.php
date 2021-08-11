<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class AccountController extends Controller
{
    public function index()
    {
        $this->authorize('dashboard_accounts');

        return view('dashboard.accounts');
    }

    public function create()
    {
        $this->authorize('dashboard_accounts');

        return view('dashboard.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => (bool)$request->isAdmin,
        ]);

        event(new Registered($user));

//        TODO fix new account creation


        return redirect('dashboard/accounts')->with('success', 'paskyra sukurta');
    }
}
