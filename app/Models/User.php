<?php
namespace App\Models;

use \Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    public function posts(){
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
}
