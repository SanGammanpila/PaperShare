<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'article_images';

    public function article()
    {
        $this->belongsTo('App\Article');
    }
}
