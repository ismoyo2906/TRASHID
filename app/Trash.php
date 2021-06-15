<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    protected $guarded = [];

    public function unit(){
        return $this->belongsTo('App\Unit', 'unit_id');
    }

    public function collectors(){
        return $this->belongsToMany('App\Collector', 'sells', 'trash_id', 'collector_id');
    }

    protected function users(){
        return $this->belongsToMany('App\User', 'transactions', 'trash_id', 'user_id');
    }
    
}
