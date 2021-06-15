<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    protected $table = "transactions";
    
    const CREATED_AT = 'date_transaction';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];
    protected $primaryKey = 'id_transaction';

    public function allData(){
        return DB::table('transactions')
                ->join('trashes', 'trashes.id', '=', 'transactions.trash_id')
                ->join('users', 'users.id', '=', 'transactions.user_id')
                ->get();
    }

}
