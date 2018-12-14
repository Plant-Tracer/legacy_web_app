<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

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

    public function getResetView()
    {

        return view('forgotpassword');
    }

    public function resetAuthenticated(Request $request)
    {
        $this->validate($request, ['password' => 'required|confirmed|min:6']);

        $credentials = $request->only('password', 'password_confirmation');

        $credentials['email'] = auth()->user()->email;

        $user = auth()->user();
        $user->update(['password' => bcrypt($credentials['password'])]);
        $user->update(['password_confirmation' => bcrypt($credentials['password_confirmation'])]);

        return $user->save() ? $this->sendResetResponse(Password::PASSWORD_RESET)
                             : 'Error';
    }

        protected function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);

        $user->save();

        auth()->guard($this->getGuard())->login($user);
    }
}