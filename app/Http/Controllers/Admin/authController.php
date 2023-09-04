<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\authFormRequest;

class authController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(authFormRequest $request)
    {
        $crendetials = $request->validated();
        if(Auth::attempt($crendetials))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
        }

        return back()->with('error', 'Incorrect credentials');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success', 'Vous étes déconnecter');
    }
}
