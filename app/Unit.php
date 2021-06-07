<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded = [];

    public function trashes(){
        return $this->hasMany('App\Trash','unit_id');
    }
}
