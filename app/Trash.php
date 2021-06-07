<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    protected $guarded = [];

    public function unit(){
        return $this->belongsTo('App\Unit');
    }

}
