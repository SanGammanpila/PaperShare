<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function articles()
    {
        // ,'category_id','article_id'
        return $this->belongsToMany('App\Article','article_categories');
    }
}
