@extends('admin.Tadmin.master')

@section('tittle', 'Tarik Saldo')

@section('content')
<form role="form" action="{{ route('pull.store', $user->id)}}" method="post" enctype="multipart/form-data">
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
    <div class="ml-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection