<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_token', 'verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','verified'
    ];

    public function verified()
    {
        $this->email_token = null;
        $this->verified = 1;
        $this->status = 1;
        $this->save();
    }
    /**
    * Send the Password reset Notification
    *
    * @param string $token
    * @return void
    */
    public function  sendPasswordResetNotification($token)
    {
      $this->notify(new CustomPasswordReset($token));
    }

    public function config()
    {
      return $this->hasOne('App\Config');
    }
}
