<?php

namespace App\Http\Controllers;

use App\Mail\ActiveUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendMailController extends Controller
{
    public function sendActiveMail($id)
    {
        $user = User::find($id);
        $user->token = strtoupper(Str::random(10));
        $user->update();
        $mailable = new ActiveUserMail($user);
        Mail::to($user->email)->send($mailable);
        return redirect()->back();
    }
}
