<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerifyEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function verify($token){
        $token = VerifyEmail::where('token', $token)->first();
        if($token){
            $user = User::find($token->user_id);
            $user->email_verified_at = Carbon::now();
            $user->save();
            session()->flash('success', 'You have successfully verified please login');
            return redirect('login');
        }else{
            session()->flash('error', 'Token Mismatch');
            return redirect('login');
        }
    }
}
