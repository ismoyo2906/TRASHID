<?php

namespace App\Http\Controllers;

use App\Pull;
use App\User;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function inputnorek(){
        return view('user.inputnorek');
    }

    public function ceknorek(Request $request){
        $request->validate([
            'no_rek' => ['required', 'numeric'],
        ]);
        
        $user = User::where('no_rek', $request->no_rek)->first();
        if(!$user){
            return redirect()->route('user.inputnorek')->with('failed', 'Norek tidak ditemukan!');
        }
        return view('user.create', compact('user'));

    }

    public function store(Request $request, $id){
        $user = User::find($id);

        $pull = new Pull;
        $pull->user_id = $id;
        $pull->admin_id = $id;
        $pull->amount_pull = $request->amount_pull;
        if($pull->amount_pull>$user->saldo){
           return redirect($_SERVER['HTTP_REFERER'].'&alert=kurang_saldo');
        }

        User::where('id', $id)->update([
            'saldo' => $user->saldo - $pull->amount_pull,
        ]);
        $pull->save();
        Alert::success('Berhasil', 'Saldo Ditarik');
        return redirect()->route('home');

    }

    public function infortarik(){
        $user = Auth::user();
        $pulls = $user->pull;
        return view('user.infotarik', compact('pulls'));
    }

    public function riwayatTransaction(){
        $user = Auth::user();
        $transaction = $user->transactions;
        return view('user.riwayatTransaction', compact('transaction'));
    }
}
