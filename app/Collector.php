<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collector extends Model
{
    protected $guarded = [];
    
    public function trashes(){
        return $this->belongsToMany('App\Trash', 'sells', 'trash_id', 'collector_id');
    }
    
}
