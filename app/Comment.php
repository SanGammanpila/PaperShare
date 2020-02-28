<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function article()
    {
        return $this->hasOne('App\Article');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
