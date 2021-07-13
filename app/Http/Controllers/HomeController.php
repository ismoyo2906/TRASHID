<?php

namespace App\Http\Controllers;

use App\Pull;
use App\Transaction;
use App\User;
use PDF;
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
        Alert::success('Berhasil', 'Meminta persetujuan Saldo');
        return redirect()->route('home');
    }

    public function infortarik(Request $request){
        $user = Auth::user()->id;

        if($request->has('search')){
            $pulls = Pull::where('date_pull', 'LIKE', '%'.$request->search.'%')->paginate(10);
        }else{
            $pulls = Pull::where('user_id', $user)->paginate(10);
        }
        return view('user.infotarik', compact('pulls'));
    }

    public function riwayatTransaction(Request $request){
        $user = Auth::user()->id;

        if($request->has('search')){
            $transactions = Transaction::where('date_transaction', 'LIKE', '%'.$request->search.'%')->paginate(10);
        }else{
            $transactions = Transaction::where('user_id', $user)->paginate(10);
        }
        return view('user.riwayatTransaction', compact('transactions'));
    }

    public function pdfFormPenarikan(){
        return view('user.pdfFormPenarikan');
    }

    public function cetakPertanggalPenarikan($tglawal, $tglakhir){
        $user = Auth::user();
        $cetakPertanggal = $user->pull->whereBetween('date_pull', [$tglawal, $tglakhir]);
        $pdf = \PDF::loadView('user.pdfPenarikan', compact('cetakPertanggal'));
        return $pdf->download('data Penarikan.pdf');
    }

    public function pdfForm(){
        return view('user.pdf-form');
    }

    public function cetakPertanggal($tglawal, $tglakhir){
        $user = Auth::user();
        $cetakPertanggal = $user->transactions->whereBetween('date_transaction', [$tglawal, $tglakhir]);
        $pdf = \PDF::loadView('user.pdf', compact('cetakPertanggal'));
        return $pdf->download('data transaction.pdf');
    }

    public function penjumlah(){
        $user = User::where('status', 1)->get();
        // $user = DB::table('users')
        // ->select(DB::raw('count(*) as user_count, status'))
        // ->where('status', '==', 1)
        // ->groupBy('status')
        // ->get();
        return view('admin.Tadmin.partial.sidbar', compact('user'));
    }
}
