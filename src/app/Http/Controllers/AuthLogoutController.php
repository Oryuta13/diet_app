<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthLogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('top');
    }
}
