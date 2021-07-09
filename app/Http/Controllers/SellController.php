<?php

namespace App\Http\Controllers;

use App\Collector;
use App\Sell;
use App\Trash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class SellController extends Controller
{   

    public function __construct()
    {
        $this->Sell = new Sell();
    }
 
    public function index(){
        $sells = $this->Sell->allData();
        return view('admin.sell.index', compact('sells'));
    }

    public function inputnorek(){
        return view('admin.sell.inputnorek');
    }

    public function ceknorek(Request $request){
        $request->validate([
            'no_rek' => ['required','numeric']
        ]);

        $trashes = Trash::all();
        $collector = Collector::where('no_rek', $request->no_rek)->first();
        if(!$collector){
            return redirect()->route('sell.inputnorek')->with('failed', 'Norek tidak ditemukan!');
        }

        return view('admin.sell.create', compact('trashes', 'collector'));
    }

    public function kdTransaction(){
        $getRow = Sell::orderBy('id_sell', 'DESC')->get();
        $rowCount = $getRow->count();

        $lastId = $getRow->first();

        $timenow = Carbon::now()->format('jny');
        $kode = "TR".$timenow."0001";

        if($rowCount>0){
            if($lastId->id_sell < 9){
                $kode = "TR".''.$timenow.'000'.($lastId->id_sell + 1);
            }elseif($lastId->id_sell < 99){
                $kode = "TR".''.$timenow.'00'.($lastId->id_sell + 1);
            }elseif($lastId->id_sell < 9999){
                $kode = "TR".''.$timenow."0".($lastId->id_sell + 1);
            }else{
                $kode = "TR".''.$timenow.''.($lastId->id_sell + 1);
            }
        }
        
        return $kode;
    }


    public function store(Request $request, $id){
        $request->validate([
            'trash_id' => ['required'],
            'amount_sell' => ['required']
        ]);

        $trash = Trash::where('id', $request->trash_id)->first();
        $admin = Auth::guard('admin')->user()->id;
        $collector = Collector::find($id);
        
        $sell = new Sell;
        $sell->kd_transaction = $this->kdTransaction();
        $sell->trash_id = $request->trash_id;
        $sell->collector_id = $collector->id;
        $sell->admin_id = $admin;
        $sell->amount_sell = $request->amount_sell;
        $sell->total_price = $request->amount_sell*$trash->trash_price;
        if($trash){
            Trash::where('id', $request->trash_id)->update([
                'amount' => $trash->amount - $sell->amount_sell,
            ]);
        }
        $sell->save();
        Alert::success('Berhasil', 'Sampah Terjual');
        return redirect()->route('sell.index');
    }

    public function destroy($id){
     $sell = DB::table('sells')->where('id_sell', $id)->first();
     $trash = Trash::where('id', $sell->trash_id)->first();
     if($trash){
        Trash::where('id', $sell->trash_id)->update([
            'amount' => $trash->amount + $sell->amount_sell,
        ]);
     }

     DB::table('sells')->where('id_sell', $id )->delete();
     Alert::success('Berhasil', 'Menghapus Data');
     return redirect()->back();
    }

}
