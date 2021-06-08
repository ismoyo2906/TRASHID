@extends('admin.Tadmin.master')

@section('tittle', 'Buat Data')

@section('content')
<form role="form" action="{{ route('trash.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">

            <div class="form-group">
                <label for="trash_name">Nama Sampah</label>
                <input type="text" class="form-control" name="trash_name" id="trash_name" value="{{ old('trash_name')}}">
                @error('trash_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="unit">Satuan</label>
                <select name="unit_id" id="unit" class="form-control">
                <option value="" selected disabled hidden>PIlIH</option>
                @foreach ($units as $t)
                <option value="{{ $t->id}}">{{ $t->unit_name }}</option>
                @endforeach
                </select>
                @error('unit_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Harga Sampah</label>
                <input type="text" class="form-control" placeholder="Rp." id="price" name="trash_price" value="{{ old('trash_price')}}">
                @error('trash_price')
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