<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Mail;
use DB;
use App\User;

class EmailresetController extends Controller
{
    public function changeMail(Request $request)
    {
        // ログインしているユーザーを取ってくる
        $user = Auth::user();

        $address = $request->input('newAddress');
        $token = hash_hmac(
            'sha256',
            str_random(40).$address,
            env('APP_KEY')
        );
        $domain = env('APP_DOMAIN');

        Mail::send(
            'emails.authorize',
            ['url' => "https:{$domain}/settings/authorizeMail/?token={$token}"],
            function ($message) use ($address, $domain) {
                $message->from(env('MAIL_ADDRESS'));
                $message->sender(env('MAIL_ADDRESS'));
                $message->to($address);
                $message->subject('メールアドレス変更確認');
            }
        );

        DB::table('email_changes')->insert([
            [
                'id' => $user->id,
                'email' => $address,
                'token' => $token
            ]
        ]);

        return view('sendMailCompleted');
    }

    public function authorizeMail(Request $request)
    {
        $token = $request->input('token');

        $email_changes = DB::table('email_changes')
            ->where('token', '=', $token)
            ->first();

        $user = User::find($email_changes->id);
        $user->email = $email_changes->email;
        $user->save();

        DB::table('email_changes')
            ->where('token', '=', $token)
            ->delete();

        return view('authorizeMailCompleted');
    }
}
