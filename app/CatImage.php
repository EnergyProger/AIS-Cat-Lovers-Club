<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatImage extends Model
{
    protected $table = 'cat_images';
    protected $fillable = [
        'photo',
        'cat_id'
    ];
}
