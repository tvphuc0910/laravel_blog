<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    public function login()
    {
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        $user = User::query()
            ->where('email', $request->get('email'))
            ->firstOrFail();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->route('login')->with('message', 'Incorrect email or password !');
        } else {
            session()->put('id', $user->id);
            session()->put('name', $user->name);
            session()->put('level', $user->level);

            return redirect(session()->get('url.intended'));
        }

    }

    public function logout()
    {
        session()->flush();
        return Redirect()->route('welcome.index');
    }
}
