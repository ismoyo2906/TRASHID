@extends('admin.Tadmin.master')

@section('tittle', 'Cetak Data Tarik Saldo' )

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <label label="tglawal">Tanggal Awal</label>
                    <input type="date" name="tglawal" id="tglawal" class="form-control datepicker">
                </div>
    
                <div class="form-group">
                    <label label="tglakhir">Tanggal Akhir</label>
                    <input type="date"  name="tglakhir" id="tglakhir" class="form-control datepicker">
                </div>
                <div class="ml-2">
                    <a href="" onclick="this.href='/pull/cetakPertanggal/'+ document.getElementById('tglawal').value +
                    '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-12">
                    Cetak <i class="fas fa-print"></i></a>
                </div>
        </div>
    </div>
</div>
@endsection
