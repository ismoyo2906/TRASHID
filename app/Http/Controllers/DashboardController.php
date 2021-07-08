<?php

namespace App\Http\Controllers;

use App\Collector;
use App\Transaction;
use App\Trash;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $transaction = Transaction::all();
        $user = User::all();
        $trash = Trash::all();
        $collector = Collector::all();
        return view('admin.dashboard', compact(['user', 'trash', 'collector','transaction']));
    }

    public function logout(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }
        
        return redirect()->route('login');
    }
}
