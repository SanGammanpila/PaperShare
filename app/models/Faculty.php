<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function users()
    {
        return $this->hasMany('\App\User');
    }
}
