<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function sendMail() {
        $user = User::find(2);
        $mailable = new HelloMail($user);
        Mail::to($user->email)->send($mailable);
        return true;
    }
}
