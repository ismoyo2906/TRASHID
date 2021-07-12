@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                                <a href="" onclick="this.href='/cetakPertanggalPenarikan/'+ document.getElementById('tglawal').value +
                                '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-12">
                                Cetak <i class="fas fa-print"></i></a>
                            </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection