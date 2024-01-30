<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    
    public function notice(){
        return "verifikasi email";
    }

    public function verify(EmailVerificationRequest $request){

        $request->fullfill();
        return "akun berhasil di feruveukasisin";
    }
}
