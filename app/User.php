<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function user_university()
    {
       return $this->belongsTo('\App\University','university');
    }

    public function user_faculty()
    {
        return $this->belongsTo('\App\Faculty','faculty','id');
    }

    public function articles()
    {
        return $this->belongsToMany('App\Article','article_authors','author_id','article_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function bookmarks()
    {
        return $this->hasMany('\App\Bookmark');
    }

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


}
