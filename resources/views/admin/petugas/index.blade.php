@extends('admin.Tadmin.master')

@section('tittle', 'Data Petugas' )
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">
@endpush

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">

     <div class="tambah">
         <a href="{{ route('admin.create') }}" class="btn btn-success">Tambah data</a>
     </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md" id="datatable">
                   <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Level</th>
                            <th>email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admins as $admin)
                        <tr>
                            <td>{{ $admin->nameLevel }}</td>
                            <td><span class="btn btn-danger">{{ $admin->level }}</span></td>
                            <td>{{ $admin->email }}</td>

                            <td>
                                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-secondary">Edit</a>

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