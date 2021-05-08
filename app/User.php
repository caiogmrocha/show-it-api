<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation with posts
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Relation with likes
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Relation with comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}