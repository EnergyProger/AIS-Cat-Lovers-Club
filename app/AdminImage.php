<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminImage extends Model
{
    protected $table = 'admin_images';
    protected $fillable = [
        'avatar',
        'bg',
        'admin_id'
    ];
}
