<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class Authcontroller extends Controller
{
    public function login()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        try {
            $user = User::query()
                ->where('email', $request->get('email'))
                ->where('password', $request->get('password'))
                ->firstOrFail();

            session()->put('id', $user->id);
            session()->put('name', $user->name);
            session()->put('level', $user->level);

            return redirect(session()->get('url.intended'));
        } catch (Throwable $e) {
            return redirect()->route('login')->with('message', 'Incorrect email or password !');
        }
    }

    public function logout()
    {
        session()->flush();
        return Redirect()->route('welcome.index');
    }
}
