<?php

namespace App\Http\Controllers\Auth;

use DB; //追加
use Mail; //追加
use Illuminate\Http\Request; //追加
use App\Mail\EmailVerification; //追加
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Auth\RegisterController;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_token' => str_random(10), //追加
        ]);
    }

    // registerメソッドをオーバーライド
    public function register(Request $request)
    {
      // validation
       $validator = $this->validator($request->all());
       if ($validator->fails())
       {
           $this->throwValidationException($request, $validator);
       }

        // DBトランザクションを利用する
        DB::beginTransaction();
        try
        {
            $user = $this->create($request->all());

            // 名前とトークンはメールビューで利用しているのでパラメーターで渡す
            $email = new EmailVerification(new User(['name' => $user->name, 'email_token' => $user->email_token]));
            Mail::to($user->email)->send($email);
            DB::commit();

            $request->session()->flash('message', '入力したメールアドレス宛に「メールア
ドレスの登録確認」メールが届くので確認してね！');
            return redirect('login');
        }
        catch(Exception $e)
        {
            // 失敗したらロールバック
            DB::rollback();

            $request->session()->flash('message', 'エラー！');
            return redirect('login');
        }
    }

    // メールアドレスの認証
    public function verify($token)
    {
      User::where('email_token', $token)->firstOrFail()->verified();
      request()->session()->flash('message', 'メールアドレスの登録確認が終わったよ！');
      return redirect('login');
    }
}
