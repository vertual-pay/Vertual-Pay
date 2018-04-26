<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'product_image';
    protected $primaryKey = 'product_image_id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'protected_id', 'mime'
    ];

    protected $baseUri = 'images/product';

    public function getUrlAtt
}
