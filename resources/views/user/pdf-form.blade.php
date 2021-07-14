@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

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
                        <form action="{{ route('user.cetakPertanggal')}}" method="get">
                            <div class="form-group">
                                <label label="tglawal">Tanggal Awal</label>
                                <input type="date" name="tglawal" id="tglawal" class="form-control datepicker">
                            </div>
                            
                            <div class="form-group">
                                <label label="tglakhir">Tanggal Akhir</label>
                                <input type="date"  name="tglakhir" id="tglakhir" class="form-control datepicker">
                            </div>
            
                            <div class="ml-2">
                                <button type="submit" class="btn btn-primary col-md-12">Cetak <i class="fas fa-print"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
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