<?php

namespace App\Infrastructure\Persistent\Eloquent;

use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    protected $table = 'shop';

    protected $fillable = [
        'flowerId',
        'image',
        'name',
        'description',
        'price'
    ];
}
