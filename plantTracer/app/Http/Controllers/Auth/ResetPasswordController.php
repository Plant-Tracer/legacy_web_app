<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['resetAuthenticated', 'getResetAuthenticatedView']);
        $this->middleware('guest')->except(['resetAuthenticated', 'getResetAuthenticatedView']);
    }

    public function getResetAuthenticatedView(Request $request)
    {
        return view('forgotPassword');
    }

        public function resetAuthenticated(Request $request)
    {
        $this->validate($request, ['password' => 'required|confirmed|min:6']);

        $credentials = $request->only('password', 'password_confirmation');

        $credentials['email'] = auth()->user()->email;

        $user = auth()->user();
        $user->update(['password' => bcrypt($credentials['password'])]);
        $user->update(['password_confirmation' => bcrypt($credentials['password_confirmation'])]);

        return $user->save() ? $this->getResetSuccessResponse(Password::PASSWORD_RESET)
                             : 'Error';
    }

}
