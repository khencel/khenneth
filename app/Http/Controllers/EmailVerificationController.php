<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\User;

class EmailVerificationController extends Controller
{
    public function verify($id){
        
        User::find($id)->update([
            "email_verified_at" => date("Y/m/d"),
        ]);

        return redirect("/");
    }
}
