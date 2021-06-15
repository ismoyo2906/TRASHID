@extends('admin.Tadmin.master')

@section('tittle', 'Data Nasabah')
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">
@endpush

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Nomor Rekening : <h3>{{$user->no_rek}}</h3></li>
                  <li class="list-group-item">Nama Nasabah   : {{$user->name}}</li>
                  <li class="list-group-item">Telepon        : {{$user->phone}}</li>
                  <li class="list-group-item">Alamat         : {{$user->address}}</li>
                  <li class="list-group-item">Email          : {{$user->email}}</li>

                  </li>
                </ul>
              </div>
          </div>
    </div>
</div>
@endsection
