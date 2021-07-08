@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @isset($_GET['alert'])
            @if ($_GET['alert']=='kurang_saldo')
            <div class="alert alert-danger alert-dismissible" role="alert">
                <div class="alert-body">
                    <div class="alert-title">Saldo kurang!</div>
                    Saldo Anda Tidak mencukupi
                </div>
            </div>
            @endif
            @endisset
            <form role="form" action="{{ route('user.store', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <ul class="list-group">
                      <li class="list-group-item">No Rekening  : <h5>{{$user->no_rek}}</h5></li>
                      <li class="list-group-item">Nama Nasabah : <h5>{{$user->name}}</h5></li>
                      <li class="list-group-item">Total Saldo : <h5>Rp.{{ number_format($user->saldo)}}</h5></li>
                    </ul>
                  </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="amount_pull">Jumlah</label>
                            <input type="text" class="form-control" placeholder="Rp." name="amount_pull" id="amount_pull"
                            value="{{ old('amount_pull')}}"></input>
                            @error('amount_pull')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
