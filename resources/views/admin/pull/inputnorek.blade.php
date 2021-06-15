@extends('admin.Tadmin.master')

@section('tittle', 'Masukan Nomor Rekening')

@section('content')

@if(session('failed'))
<div class="alert alert-danger alert-has-icon" role="alert">
    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
    <div class="alert-body">
        <div class="alert-title">{{ session('failed')}}</div>
        isi kembali no rekening anda
    </div>
</div>
@endif

<form role="form" action="{{ route('pull.ceknorek')}}" method="get" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="no_rek">No Rekening</label>
                <input type="text" class="form-control" id="no_rek" name="no_rek">
                @error('no_rek')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="ml-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection

<script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 1500);
</script>