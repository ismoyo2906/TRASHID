@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="amount_pull">Jumlah Tarik</label>
                        <input type="text" class="form-control" placeholder="Rp." name="amount_pull" id="amount_pull"
                        value="{{ old('amount_pull')}}"></input>
                        @error('amount_pull')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
