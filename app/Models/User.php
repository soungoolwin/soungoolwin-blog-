<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function likeBlogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_user');
    }
    //This is for like feature for myanmar blogs table. This is many to many rs.
    public function likeEblogs()
    {
        return $this->belongsToMany(EngBlog::class, 'eblog_user');
    }
    //This is for like feature for english blogs table. This is many to many rs.

    public function isSubscribe()
    {
        return $this->hasOne(Subscriber::class);
    }
}
