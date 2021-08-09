<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $this->authorize('dashboard_accounts');

        return view('dashboard.accounts');
    }
}
