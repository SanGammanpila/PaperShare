<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
    public function categories()
    {
        return $this->belongsToMany('App\Category','article_categories');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function resources()
    {
        return $this->hasMany('App\Resource');
    }

    public function images()
    {
       return $this->hasMany('App\Image');
    }

    public function documents()
    {
       return $this->hasMany('App\Document');
    }

    public function authors()
    {
        return $this->belongsToMany('App\User','article_authors','article_id','author_id');
    }
    
    public function type()
    {
        return $this->belongsTo('\App\ArticleType');
    }
    // ,'article_id','category_id'

}
