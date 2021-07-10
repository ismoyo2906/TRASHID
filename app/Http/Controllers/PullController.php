<?php

namespace App\Http\Controllers;

use App\Pull;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\PDF;

class PullController extends Controller
{   

    public function __construct()
    {
        $this->Pull = new Pull();
    }

    public function index(){
        $pulls = $this->Pull->allData();
        return view('admin.pull.index', compact('pulls'));
    }
    
    public function inputnorek(){
        return view('admin.pull.inputnorek');
    }

    public function ceknorek(Request $request){
        $request->validate([
            'no_rek' => ['required', 'numeric'],
        ]);
        
        $user = User::where('no_rek', $request->no_rek)->first();
        if(!$user){
            return redirect()->route('pull.inputnorek')->with('failed', 'Norek tidak ditemukan!');
        }

            return view('admin.pull.create', compact('user'));
    }

    public function store(Request $request, $id){
        $request->validate([
            'amount_pull' => ['required'],
        ]);

        $user = User::find($id);
        $admin = Auth::guard('admin')->user()->id;

        $pull = new Pull;
        $pull->user_id = $id;
        $pull->admin_id = $admin;
        $pull->amount_pull = $request->amount_pull;
        if($pull->amount_pull>$user->saldo){
           return redirect($_SERVER['HTTP_REFERER'].'&alert=kurang_saldo');

        }
            User::where('id', $id)->update([
                'saldo' => $user->saldo - $pull->amount_pull,
            ]);
        $pull->save();
        Alert::success('Berhasil', 'Saldo Ditarik');
        return redirect()->route('pull.index');
    }

    public function pdfForm(){
        return view('admin.pull.pdf-form');
    }

    public function cetakPertanggal($tglawal, $tglakhir){
        $cetakPertanggal = $this->Pull->allData()->whereBetween('date_pull', [$tglawal, $tglakhir]);
        $pdf = \PDF::loadView('admin.pull.pdf', compact('cetakPertanggal'));
        return $pdf->download('data tarik saldo.pdf');
    }
}
