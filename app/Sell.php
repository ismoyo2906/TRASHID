<?php

namespace App;

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
                ->get();
    }


}
