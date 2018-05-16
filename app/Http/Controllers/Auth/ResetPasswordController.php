<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;




class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    use ResetsPasswords;
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected function rules()
    {
        return [
            'password' => 'required|confirmed|min:6',
        ];
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm(Request $request, $token = null)
    {
        if (is_null($token)) {
            return $this->email();
        }

        $email = $request->input('email');

        if (property_exists($this, 'resetView')) {
            return view($this->resetView)->with(compact('token', 'email'));
        }

        if (view()->exists('auth.passwords.reset')) {
            return view('auth.passwords.reset')->with(compact('token', 'email'));
        }

        return view('auth.reset')->with(compact('token', 'email'));
    }

    public function reset(Request $request)
   {
       $this->validate($request, $this->rules(), $this->validationErrorMessages());
       // Here we will attempt to reset the user's password. If it is successful we
       // will update the password on an actual user model and persist it to the
       // database. Otherwise we will parse the error and return the response.
       $response = $this->broker()->reset(
           $this->credentials($request), function ($user, $password) {
               $this->resetPassword($user, $password);
           });
       // If the password was successfully reset, we will redirect the user back to
       // the application's home authenticated view. If there is an error we can
       // redirect them back to where they came from with their error message.
       return $response == Password::PASSWORD_RESET
                   ? $this->sendResetResponse($response)
                   : $this->sendResetFailedResponse($request, $response);
   }
}
