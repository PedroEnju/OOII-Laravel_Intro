<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['nome', 'uf'];

    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
