<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update(UpdateSettingRequest $request)
    {
        auth()->user()->update($request->only('name', 'email'));

        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        return redirect()->route('settings')->with('message', 'Paskyra atnaujinta sėkmingai!');
    }
}
