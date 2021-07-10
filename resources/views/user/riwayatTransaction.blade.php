@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-8">
            
            <div class="card">
                <div class="card-body">
                    <span class="btn btn-primary btn-lg disabled  mb-3"><h5>Riwayat Transaksi</h5></span>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md" id="datatable">
                           <thead>
                                <tr>
                                    <th>Nama Nasabah</th>
                                    <th>Nama Sampah</th>
                                    <th>Total harga</th>
                                    <th>Jumlah</th>
                                    <th>petugas</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaction as $transaction)
                                <tr>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ $transaction->trash->trash_name }}</td>
                                    <td>Rp. {{ number_format($transaction->total_price)}}</td>
                                    <td>{{ $transaction->amount_transaction }}</td>
                                    <td>{{ $transaction->admin->nameLevel }}</td>
                                    <td>{{ $transaction->date_transaction->format('Y-m-d')}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" align="center">no data appears</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function(){
     
     $('#datatable').DataTable();

   });
</script>
@endpush


