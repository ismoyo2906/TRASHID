@extends('admin.Tadmin.master')

@section('tittle', 'Data Pengepul')
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">
@endpush

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">

     <div class="tambah">
         <a href="{{ route('collector.create') }}" class="btn btn-success">Tambah data</a>
     </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md" id="datatable">
                   <thead>
                        <tr>
                            <th>Nomor Rek</th>
                            <th>Nama Pengepul</th>
                            <th>Nama Perusahan</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($collectors as $collector)
                        <tr>
                            <td>{{ $collector->no_rek }}</td>
                            <td>{{ $collector->collector_name }}</td>
                            <td>{{ $collector->company_name }}</td>
                            <td>{{ $collector->address }}</td>
                            <td>{{ $collector->phone }}</td>
                          
                            <td>
                                <a href="{{ route('collector.edit', $collector->id) }}" class="btn btn-secondary">Edit</a>
                                <a href="{{ route('collector.destroy', $collector->id)}}" 
                                class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin Menghapus?')">Delete</a>
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