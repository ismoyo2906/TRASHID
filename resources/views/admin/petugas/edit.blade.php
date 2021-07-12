@extends('admin.Tadmin.master')

@section('tittle', 'Buat Data')

@section('content')
<form role="form" action="{{ route('admin.update', $admin->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-body">

            <div class="form-group">
                <label for="nameLevel">Nama Level</label>
                <input type="text" class="form-control" name="nameLevel" id="nameLevel" value="{{ old('nameLevel', $admin->nameLevel)}}">
                @error('nameLevel')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
           
            <div class="form-group">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control">
                <option value="" selected disabled hidden>PIlIH</option>
                <option value="admin">admin</option>
                <option value="petugas">petugas</option>
                </select>
                @error('level')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Username</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $admin->email)}}">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" value="{{ old('password')}}">
                @error('password')
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
