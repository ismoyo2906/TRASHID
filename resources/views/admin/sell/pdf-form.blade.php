@extends('admin.Tadmin.master')

@section('tittle', 'Cetak Data Pembelian' )

@section('content')
<div class="col-12 col-md-6 col-lg-12">

    @if(session('failed'))
    <div class="alert alert-danger alert-has-icon" role="alert">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
            <div class="alert-title">{{ session('failed')}}</div>
        </div>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('sell.cetakPertanggal')}}" method="get">
                <div class="form-group">
                    <label label="tglawal">Tanggal Awal</label>
                    <input type="date" name="tglawal" id="tglawal" class="form-control datepicker">
                </div>
                
                <div class="form-group">
                    <label label="tglakhir">Tanggal Akhir</label>
                    <input type="date"  name="tglakhir" id="tglakhir" class="form-control datepicker">
                </div>

                <div class="ml-2">
                    <button type="submit" class="btn btn-primary">Cetak <i class="fas fa-print"></i></button>
                </div>
            </form>
                
        </div>
    </div>
</div>
@endsection
<script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 1500);
</script>   