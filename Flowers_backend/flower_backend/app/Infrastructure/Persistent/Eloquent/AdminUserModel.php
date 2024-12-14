<?php

namespace App\Infrastructure\Persistent\Eloquent;
use Illuminate\Database\Eloquent\Model;

class AdminUserModel extends Model{

    protected $table = 'admin_user';
    protected $fillable = ['username','firstname','lastname','password'];
}