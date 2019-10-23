<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['nome'];

    public function state()
    {
        return $this->belongsTo('App\State');
    }
}
