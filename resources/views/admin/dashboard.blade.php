@extends('admin.Tadmin.master')

@section('tittle', 'Dashboard')
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">
@endpush
@section('content')
    <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
              <div class="card-stats">
                <div class="nasabah">
                  <div class="card-stats-items mt-5">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{ count($user)}}</div>
                      <div class="card-stats-item-label">Active</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{ count($inactive)}}</div>
                      <div class="card-stats-item-label">Inactive</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-user-clock"></i>
              </div>
              <div class="card-wrap mb-5">
                <div class="card-header">
                  <h4>Total Nasabah</h4>
                </div>
                <div class="card-body">
                  {{ count($user)}}
                </div>
              </div>
            </div>
          </div>
          
            <div class="col-lg-8 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-money-check-alt"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Notifikasi Tarik Saldo</h4>
                  </div>
                  <div class="card-body">
                    {{ count($pencairan)}}
                  </div>
                </div>
              </div>

              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-dumpster"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Sampah</h4>
                  </div>
                  <div class="card-body">
                    {{ count($trash)}}
                  </div>
                </div>
              </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pengepul</h4>
                  </div>
                  <div class="card-body">
                    {{ count($collector)}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Transactions</h4>
                  </div>
                  <div class="card-body">
                    {{ count($transaction)}}
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
