<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function show($id){
        $user = User::where('id', $id)->first();
        return view('admin.user.show', compact('user'));
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        Alert::success('Berhasil', 'Mengubah Data');
        return redirect()->back();
    }

    
    public function noactive($id){
        User::where('id', $id)->update([
            'status' => 0
        ]);
        return redirect()->back();
    }

    public function active($id){
        User::where('id', $id)->update([
            'status' => 1
        ]);
        return redirect()->back();
    }

}
