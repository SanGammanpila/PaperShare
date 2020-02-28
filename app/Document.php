<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'article_documents';

    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
