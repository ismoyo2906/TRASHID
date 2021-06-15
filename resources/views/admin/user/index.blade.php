@extends('admin.Tadmin.master')

@section('tittle', 'Data Nasabah')
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">
@endpush

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md" id="datatable">
                   <thead>
                        <tr>
                            <th>Nomor Rek</th>
                            <th>Email</th>
                            <th>Saldo</th>
                            <th>Status</th>
                            <th>Waktu daftar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{$user->no_rek }}</td>
                            <td>{{ $user->email }}</td>                          
                            <td>Rp. {{ number_format($user->saldo) }}</td>                                          
                            <td>                           
                                @if ($user->status == 1)
                                    <a href="{{ route('user.noactive', $user->id)}}" class="badge badge-info" onclick="return confirm('Apakah Anda yakin ingin Aktifkan?')">Not Active</a>
                                @elseif ($user->status == 0)
                                    <a href="{{ route('user.active', $user->id)}}" class="badge badge-success" onclick="return confirm('Apakah Anda yakin untuk non-aktifkan?')">Active</a>
                                @endif

                            </td>        
                             <td>{{$user->created_at->diffForHumans()}}</td>                                                  
                            <td>
                                <div class="row">
                                    <a href="{{ route('user.show', $user->id)}}" class="btn btn-secondary btn-sm">Detail</a>
                                    <a href="{{ route('user.delete', $user->id)}}" 
                                    class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin Menghapus?')">Delete</a>
                                </div>
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
  <script>
       $(document).ready(function(){
        
        $('#datatable').DataTable();

      });
  </script>
@endpush