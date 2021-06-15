<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pull extends Model
{
    protected $guarded = [];

    protected $table = "pulls";

    const CREATED_AT = 'date_pull';
    const UPDATED_AT = 'updated_at';
    
    public function allData(){
        return DB::table('pulls')
        ->join('users', 'users.id', '=', 'pulls.user_id')
        ->get();
    }

    public function admin(){
        return $this->belongsTo('App\Admin', 'admin_id');
    }
}
