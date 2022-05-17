<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Mail;
use Hash;
use Illuminate\Support\Str;
use App\User;

class AuthController extends Controller
{
    public $path = 'backend.pages.users.';

    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function showForgetPasswordForm()
    {
        return view('auth.passwords.email');
    }

    public function showResetPasswordForm($token) {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                                'email' => $request->email,
                                'token' => $request->token
                            ])->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('https://skitab.projects.dimofinf.net');
    }
}
