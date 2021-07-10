<?php

namespace App\Http\Controllers;

use App\Collector;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\PDF;

class CollectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collectors = Collector::all();
        return view('admin.collector.index', compact('collectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.collector.create');
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
            'collector_name' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'phone' => 'required|min:9|max:13|unique:collectors,phone'
        ]);

        $random = rand(4, 9999);
        $timenow = Carbon::now()->format('jny');

        if(Carbon::now()->format('n') >= 10){
            $no_rek = $timenow.rand(4, 999);
        }else{
            $no_rek = $timenow.$random;
        }

        $collector = new Collector;
        $collector->no_rek = $no_rek;
        $collector->collector_name = $request->collector_name;
        $collector->company_name = $request->company_name;
        $collector->address = $request->address;
        $collector->phone = $request->phone;
        $collector->save();


        Alert::success('Berhasil', 'Menambahkan Data');
        return redirect()->route('collector.index');
        
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
        $collector = Collector::find($id);
        return view('admin.collector.edit', compact('collector'));
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
            'collector_name' => ['required'],
            'company_name' => ['required'],
            'address' => ['required'],
            'phone' => ['required', 'numeric'],
        ]);

        Collector::where('id', $id)->update([
            'collector_name' => $request['collector_name'],
            'company_name' => $request['company_name'],
            'address' => $request['address'],
            'phone' => $request['phone'],
        ]);

        Alert::success('Berhasil', 'Mengubah Data');
        return redirect()->route('collector.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collector = Collector::find($id);
        $collector->delete();

        Alert::success('Berhasil', 'Menghapus data');
        return redirect()->back();
    }

    public function pdfForm(){
        return view('admin.collector.pdf-form');
    }

    public function cetakPertanggal($tglawal, $tglakhir){
        $cetakPertanggal = Collector::with('sell')->whereBetween('created_at', [$tglawal, $tglakhir])->latest()->get();
        $pdf = \PDF::loadView('admin.collector.pdf', compact('cetakPertanggal'));
        return $pdf->download('data-pengepul.pdf');
    }
}
