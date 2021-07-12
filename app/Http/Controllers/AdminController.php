<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function index(){
        $admins = Admin::all();
        return view('admin.petugas.index', compact('admins'));
    }

    public function create(){
        return view('admin.petugas.create');
    }
    
    public function register(Request $request){
        $request->validate([
            'nameLevel' => 'required',
            'level' => 'required',
            'email' => 'required|unique:admins,email',
            'password' => 'required|min:8|string'
        ]);

        Admin::create([
            'nameLevel' => $request['nameLevel'],
            'level' => $request['level'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        
        Alert::success('Berhasil', 'Menambahkan Data');
        return redirect()->route('admin.index');
    }

    public function edit($id){
        $admin = Admin::find($id);
        return view('admin.petugas.edit', compact('admin'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nameLevel' => 'required',
            'level' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|string'
        ]);

        Admin::where('id', $id)->update([
            'nameLevel' => $request['nameLevel'],
            'level' => $request['level'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        Alert::success('Berhasil', 'Mengubah Data');
        return redirect()->route('admin.index');
    }

}
