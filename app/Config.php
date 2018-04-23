<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{


    protected $table = 'config';
    protected $guarded = array('id');

    public static $rules = array(
      'address' => 'required',
      'password' => 'required'
    );

    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function getData()
    {
      return $this->id. ': '. $this->title;
    }
}
