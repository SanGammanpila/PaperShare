<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    public function article()
    {
        return $this->hasOne('App\Article');
    }
}
