@extends('layouts.app')

@push('stylesheet')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <ul class="list-group">
                  <li class="list-group-item">No Rekening  : <h4 class="font-weight-bold">{{ Auth::user()->no_rek }}</h4></li>
                  <li class="list-group-item">Nama Nasabah : <h5>{{ Auth::user()->name}}</h5></li>
                </ul>
              </div>
            <div class="card">
                <div class="card-header">Saldo Anda :</div>

                <div class="card-tengah">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="saldo">
                       <h1>Rp. {{ number_format(Auth::user()->saldo)}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
  @include('sweetalert::alert')
@endpush
