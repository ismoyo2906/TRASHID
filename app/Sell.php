<?php

namespace App;

use Collator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sell extends Model
{
    protected $guarded = [];

    const CREATED_AT = 'date_sells';
    const UPDATED_AT = 'updated_at';

    public function allData(){
        return DB::table('sells')
                ->join('trashes', 'trashes.id', '=', 'sells.trash_id')
                ->join('collectors', 'collectors.id', '=', 'sells.collector_id')
                ->join('admins', 'admins.id', '=', 'sells.admin_id')
                ->get();
    }  

    public function trash(){
        return $this->belongsTo(Trash::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function collector(){
        return $this->belongsTo(Collector::class);
    }


}
