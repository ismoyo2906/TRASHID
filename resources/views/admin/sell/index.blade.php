@extends('admin.Tadmin.master')

@section('tittle', 'Data Penjualan')
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">
@endpush

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">

     <div class="tambah">
         <a href="{{ route('sell.inputnorek') }}" class="btn btn-success">Jual Sampah</a>
     </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md" id="datatable">
                   <thead>
                        <tr>
                            <th>No Rekening</th>
                            <th>Nama perusahaan</th>
                            <th>Jumlah sampah</th>
                            <th>Total Harga</th>
                            <th>Tanggal Transaksi</th>
                            <th>Petugas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sells as $sell)
                        <tr>
                            <td>{{ $sell->no_rek }}</td>
                            <td>{{ $sell->company_name }}</td>
                            <td>{{ $sell->amount_sell }}</td>
                            <td>{{ $sell->total_price }}</td>
                            <td>{{ $sell->date_sells }}</td>
                            <td>-</td>
                            <td>
                                <a href="#" class="btn btn-secondary">Detail</a>
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
