<?php

namespace App\Http\Controllers;

use App\Trash;
use App\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trashes = Trash::all();
        return view('admin.trash.index', compact('trashes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $units = Unit::all();
        return view('admin.trash.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'trash_name' => ['required', 'string', 'unique:trashes,trash_name'],
            'unit_id' => ['required'],
            'trash_price' => ['required', 'numeric'],
        ]);   

        Trash::create([
            'trash_name' => $request['trash_name'],
            'unit_id' => $request['unit_id'],
            'trash_price' => $request['trash_price'],
        ]);
        
        Alert::success('Berhasil', 'Menambahkan Data');
        return redirect()->route('trash.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $trash = Trash::find($id);
        $units = Unit::all();
        return view('admin.trash.edit', compact('trash','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'trash_name' => ['required', 'string'],
            'unit_id' => ['required'],
            'trash_price' => ['required', 'numeric'],
        ]);   

        Trash::where('id', $id)->update([
            'trash_name' => $request['trash_name'],
            'unit_id' => $request['unit_id'],
            'trash_price' => $request['trash_price'],
        ]);

        Alert::success('Berhasil', 'Mengubah Data');
        return redirect()->route('trash.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trash = Trash::find($id);
        $trash->delete();

        Alert::success('Berhasil', 'Menghapus Data');
        return redirect()->back();
    }
}
