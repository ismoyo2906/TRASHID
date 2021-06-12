@extends('admin.Tadmin.master')

@section('tittle', 'Buat Data Pengepul')

@section('content')
<form role="form" action="{{ route('collector.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">

            <div class="form-group">
                <input type="hidden" class="form-control" name="no_rek" id="no_rek" value="{{ old('collector_name')}}">
            </div>
            
            <div class="form-group">
                <label for="collector_name">Nama Pengepul</label>
                <input type="text" class="form-control" name="collector_name" id="collector_name" value="{{ old('collector_name')}}">
                @error('collector_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="company_name">Nama Perusahaan</label>
                <input type="text" class="form-control" name="company_name" id="company_name" value="{{ old('company_name')}}">
                @error('company_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Telpone</label>
                <input type="number" class="form-control" name="phone" id="phone" value="{{ old('phone')}}">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea name="address" id="address" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 117px;"></textarea>
                @error('address')
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

@push('script')
  @include('sweetalert::alert')
@endpush