@extends('admin.Tadmin.master')

@section('tittle', 'Edit Data Pembelian')

@section('content')
<form role="form" action="{{ route('transaction.update', $transaction->id_transaction)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
                    @error('trash_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="amount_transaction">Jumlah</label>
                    <input type="number" class="form-control" placeholder="0,0" id="totalAmt" step="0.1" name="amount_transaction" id="amount_transaction" value="{{ old('amount_transaction', number_format($transaction->amount_transaction,1))}}"></input>
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
@push('script')
  @include('sweetalert::alert')
@endpush