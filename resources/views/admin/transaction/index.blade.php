@extends('admin.Tadmin.master')

@section('tittle', 'Data Pembelian')
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">
@endpush

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">

     <div class="tambah">
         <a href="{{ route('transaction.inputnorek') }}" class="btn btn-success">Beli Sampah</a>
     </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md" id="datatable">
                   <thead>
                        <tr>
                            <th>No Transaksi</th>
                            <th>Nama Nasabah</th>
                            <th>Jumlah Sampah</th>
                            <th>Sampah</th>
                            <th>Satuan</th>
                            <th>Tanggal Stor</th>
                            <th>Petugas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->kd_transaction }}</td>
                            <td>{{ $transaction->name }}</td>
                            <td>{{ number_format($transaction->amount_transaction,1)}} </td>
                            <td>{{ $transaction->trash_name }} </td>
                            <td>{{ $transaction->unit_id }} </td>
                            <td>{{ $transaction->date_transaction }}</td>
                            <td>{{ $transaction->nameLevel }}</td>
                            <td>
                                <a href="{{ route('transaction.destroy', $transaction->id_transaction)}}" data-id="$trash->id"
                                    class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin Menghapus?')">Delete</a>
                            </td>
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
@endsection

@push('script')
  @include('sweetalert::alert')
  <script>
       $(document).ready(function(){
        
        $('#datatable').DataTable();

      });
  </script>
@endpush
