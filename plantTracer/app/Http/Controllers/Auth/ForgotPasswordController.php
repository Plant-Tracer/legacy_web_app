<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\User;
use App\Mail\PasswordReset;
use DB;

class ForgotPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getForgotView()
    {
        return view('forgotpassword');
    }

    public function getResetView(){
        return view('passwordreset');
    }

        public function resetPassword(Request $request)
    {
        $email = $request->get('email');
        if(DB::table('users')->where('email','=',request(['email']))->exists()){

            $passwordconf = $request->get('password_confirmation');

            $user = User::where('email', $request->get('email'))->first();
            
            $user->update(['password' => $request->get('password')]);

            $user->update(['password_confirmation' => bcrypt($passwordconf)]);

            return redirect('index')->with('alert','Your password has successfully been updated');

        }
    
    }

    public function resetAuthenticated(Request $request)
    {

        $email = $request->get('email');

        if(DB::table('users')->where('email','=',request(['email']))->exists()){

            $user = User::where('email', $request->get('email'))->first();

            \Mail::to($user)->send(new PasswordReset);

        return redirect('index')->with('alert', 'An email has been sent to you with instructions on how to reset your password');

        }

        else{

            return back()->with('alert', 'This email does not exist in our records');
        }

    }
}

