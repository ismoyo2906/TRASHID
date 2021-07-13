@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-8">
            
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <span class="btn btn-primary btn-lg disabled mb-3 ml-3"><h5>Riwayat Transaksi</h5></span>
                    </div>

                    <a href="{{ route('user.pdfForm') }}" class="btn btn-primary float-right mb-3">Print <i class="fas fa-print"></i></a>
                    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('user.riwayatTransaction')}}">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search by tanggal" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md" id="datatable">
                           <thead>
                                <tr>
                                    <th>No Transaksi</th>
                                    <th>Nama Nasabah</th>
                                    <th>Nama Sampah</th>
                                    <th>Total harga</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>petugas</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->kd_transaction}}</td>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ $transaction->trash->trash_name }}</td>
                                    <td>Rp. {{ number_format($transaction->total_price)}}</td>
                                    <td>{{ $transaction->amount_transaction }}</td>
                                    <td>{{ $transaction->trash->unit->unit_name }}</td>
                                    <td>{{ $transaction->admin->nameLevel }}</td>
                                    <td>{{ $transaction->date_transaction->format('Y-m-d')}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" align="center">no data appears</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



