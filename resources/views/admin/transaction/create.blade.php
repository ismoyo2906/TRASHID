@extends('admin.Tadmin.master')

@section('tittle', 'Beli Sampah')

@section('content')
<form role="form" action="{{ route('transaction.store', $user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">No Rekening  : <h5>{{$user->no_rek}}</h5></li>
          <li class="list-group-item">Nama Nasabah : <h5>{{$user->name}}</h5></li>
        </ul>
      </div>
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="trash">Sampah</label>
                    <select name="trash_id" class="form-control" id="trash">
                     <option value="" selected disabled hidden>PIlIH</option>
                      @forelse ($trashes as $trash)
                      <option value="{{ $trash->id}}">{{ $trash->trash_name}}
                      (Rp. {{number_format($trash->trash_price)}})</option>
                      @empty

                      @endforelse
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="amount_transaction">Jumlah</label>
                    <input type="number" class="form-control" placeholder="0,0" id="totalAmt" step="0.1" name="amount_transaction" id="amount_transaction"
                    value="{{ old('amount_transaction')}}"></input>
                    @error('amount_transaction')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

        </div>
    </div>
    <div class="ml-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection