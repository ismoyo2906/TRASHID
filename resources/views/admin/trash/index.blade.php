@extends('admin.Tadmin.master')

@section('tittle', 'Data Sampah' )
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">
@endpush

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">

     <div class="tambah">
         <a href="{{ route('trash.create') }}" class="btn btn-success">Tambah data</a>
     </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md" id="datatable">
                   <thead>
                        <tr>
                            <th>Nama Sampah</th>
                            <th>Harga Sampah</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trashes as $trash)
                        <tr>
                            <td>{{ $trash->trash_name }}</td>
                            <td>Rp. {{ number_format($trash->trash_price)}}</td>
                            <td>{{ $trash->unit->unit_name }}</td>
                            <td>{{ number_format($trash->amount) }}</td>
                            <td>
                                <a href="{{ route('trash.edit', $trash->id) }}" class="btn btn-secondary">Edit</a>
                                <a href="{{ route('trash.destroy', $trash->id)}}" data-id="$trash->id"
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