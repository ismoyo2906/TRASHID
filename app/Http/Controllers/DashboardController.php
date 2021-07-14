<?php

namespace App\Http\Controllers;

use App\Collector;
use App\Transaction;
use App\Trash;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    public function index(){
        $pencairan = DB::table('pulls')->where('pencairan', 0)->get();
        $user = DB::table('users')->where('status', 0)->get();
        $inactive = DB::table('users')->where('status', 1)->get();
        $transaction = Transaction::all();
        $users = User::all();
        $trash = Trash::all();
        $collector = Collector::all();
        return view('admin.dashboard', compact(['users', 'trash', 'collector','transaction', 'user', 'inactive', 'pencairan']));
    }

    public function logout(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }
        
        return redirect()->route('login');
    }
}
