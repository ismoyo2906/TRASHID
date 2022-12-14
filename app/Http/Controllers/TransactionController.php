<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Trash;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
USE PDF;
class TransactionController extends Controller
{

    public function __construct()
    {
        $this->Transaction = new Transaction();
    }
 
    public function index(){      
        $transactions = Transaction::with(['trash', 'admin', 'user'])->get();
        return view('admin.transaction.index', compact('transactions'));
    }

    public function inputnorek(){
        return view('admin.transaction.inputnorek');
    }
    

    public function ceknorek(Request $request){
        $request->validate([
            'no_rek' => ['required', 'numeric'],
        ]);

        $trashes = Trash::all();
        $user = User::where('no_rek', $request->no_rek)->first();
        if(!$user){
            return redirect()->route('transaction.inputnorek')->with('failed', 'Norek tidak ditemukan!');
        }

            return view('admin.transaction.create', compact('trashes', 'user'));
    }

    public function kdTransaction(){
        $getRow = Transaction::orderBy('id_transaction', 'DESC')->get();
        $rowCount = $getRow->count();

        $lastId = $getRow->first();

        $timenow = Carbon::now()->format('jny');
        $kode = "TR".$timenow."0001";

        if($rowCount>0){
            if($lastId->id_transaction < 9){
                $kode = "TR".''.$timenow.'000'.($lastId->id_transaction + 1);
            }elseif($lastId->id_transaction < 99){
                $kode = "TR".''.$timenow.'00'.($lastId->id_transaction + 1);
            }elseif($lastId->id_transaction < 9999){
                $kode = "TR".''.$timenow."0".($lastId->id_transaction + 1);
            }else{
                $kode = "TR".''.$timenow.''.($lastId->id_transaction + 1);
            }
        }
        
        return $kode;
    }

    public function store(Request $request, $id){
        $request->validate([
            'trash_id' => ['required'],
            'amount_transaction' => ['required']
        ]);
        
        $user = User::find($id);
        $trash = Trash::where('id', $request->trash_id)->first();
        $admin = Auth::guard('admin')->user()->id;

        $transaction = new Transaction;
        $transaction->kd_transaction = $this->kdTransaction();
        $transaction->user_id = $id;
        $transaction->trash_id = $request->trash_id;
        $transaction->admin_id = $admin;
        $transaction->amount_transaction = $request->amount_transaction;
        $transaction->total_price = $request->amount_transaction*$trash->trash_price;
        if($user){
            User::where('id', $id)->update([
                'saldo' => $transaction->total_price+$user->saldo,
            ]);            
                if($trash){
                    Trash::where('id', $request->trash_id)->update([
                        'amount' => $transaction->amount_transaction+$trash->amount,
                    ]);
                }
        }
        $transaction->save();
        Alert::success('Berhasil', 'Sampah Terbeli');
        return redirect()->route('transaction.index');
    }
    
    public function edit($id){
        $transaction = DB::table('transactions')->where('id_transaction', $id)->first();
        $trashes = Trash::all();
        return view('admin.transaction.edit', compact('transaction', 'trashes'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'trash_id' => ['required'],
            'amount_transaction' => ['required'],
        ]);

        $transaction = DB::table('transactions')->where('id_transaction', $id )->first();
        $trash = Trash::where('id', $transaction->trash_id)->first();
        $user = User::where('id', $transaction->user_id)->first();

        if($transaction->amount_transaction < $request["amount_transaction"]){
            $less = $transaction->amount_transaction * $trash->trash_price;
            dd($less);
            // 1*1000 = $less(1000)
            // $user->saldo-$less = $result(2000)
            // 'saldo'=> $request->amount_transaction*$trash_price
            // saldo=3000
                User::where('id', $transaction->user_id)->update([
                    'saldo' => $user->saldo-$less,
                    // 'saldo' => $request["amount_transaction"]*$trash->price
                ]);
                // if($user->saldo){
                //     User::where('id', $transaction->user_id)->update([
                //         'saldo' => $request["amount_transaction"]*$trash->price
          
                //     ]);
                // }
        }
 
        DB::table('transactions')->where('id_transaction', $id)
        ->update([
            'trash_id' => $request["trash_id"],
            'amount_transaction' => $request["amount_transaction"],
        ]);
        
       
        Alert::success('Berhasil', 'Mengubah Data');
        return redirect()->route('transaction.index');
                        //klo requestnya dimasukin nanti malah double ngitungnya
                        /**
                         * $less(2000) = $transaction->amount_transaction * $trash->trash_price;
                         * saldo(3000)= $user->saldo(5000)-$less(2000)
                         * baru deh kaya awal lagi nge updatenya
                         * 
                         * kurangin dulu saldonya
                         * baru create lagi
                         * 
                         * saldonya di kuranging dulu sama yang di jumlahnya 
                         * saldo = $user->saldo-$less
                         * mau edit jumlahnya baru di kalikan lagi dengan trash_pricenya 
                         */
                        //$less = $transaction->amount_transaction * $trash->trash_price;
                        // saldo = $user->saldo-$less

    }

    public function destroy($id){
        $transaction = DB::table('transactions')->where('id_transaction', $id )->first();
        $trash = Trash::where('id', $transaction->trash_id)->first();
        $user = User::where('id', $transaction->user_id)->first();
        if($user){
            $less = $transaction->amount_transaction * $trash->trash_price;
            User::where('id', $transaction->user_id)->update([
                'saldo' =>  $user->saldo - $less,
            ]);
                if($trash){
                    Trash::where('id', $transaction->trash_id)->update([
                        'amount' => $trash->amount - $transaction->amount_transaction,
                    ]);
                }

        }
        DB::table('transactions')->where('id_transaction', $id )->delete();
        Alert::success('Berhasil', 'Menghapus Data');
        return redirect()->back();
    }

    public function pdfForm(){
        return view('admin.transaction.pdf-form');
    }

    public function cetakPertanggal(Request $request){
        if($request->tglawal && $request->tglakhir){
            $cetakPertanggal = Transaction::with(['trash', 'admin', 'user'])->get()->whereBetween('date_transaction', [$request->tglawal, $request->tglakhir]);
            $pdf = \PDF::loadView('admin.transaction.pdf', compact('cetakPertanggal'));
            return $pdf->download('data-Transaksi.pdf');
        }else{
            return redirect()->route('transaction.pdfForm')->with('failed', 'Harap isi tanggal');
        }
    }

}
