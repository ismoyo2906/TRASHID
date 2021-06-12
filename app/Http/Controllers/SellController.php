<?php

namespace App\Http\Controllers;

use App\Collector;
use App\Sell;
use App\Trash;
use App\Unit;
use Illuminate\Http\Request;
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


    public function store(Request $request, $id){
        $request->validate([
            'trash_id' => ['required'],
            'amount_sell' => ['required']
        ]);

        $trash = Trash::where('id', $request->trash_id)->first();
        $collector = Collector::find($id);
        $sell = new Sell;
        $sell->trash_id = $request->trash_id;
        $sell->collector_id = $collector->id;
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




}
