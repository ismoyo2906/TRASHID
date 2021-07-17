@extends('admin.Tadmin.master')

@section('tittle', 'Data Tarik Saldo')
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">
@endpush

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">

     <div class="tambah">
         <a href="{{ route('pull.inputnorek') }}" class="btn btn-success">Tarik Saldo</a>
     </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md" id="datatable">
                   <thead>
                        <tr>
                            <th>Nama Nasabah</th>
                            <th>No rekening</th>
                            <th>Jumlah Penarikan</th>
                            <th>Tanggal Penarikan</th>
                            <th>Status</th>
                            <th>Pencairan</th>
                            <th>Petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pulls as $pull)
                        <tr>
                            <td>{{$pull->name }}</td>
                            <td>{{$pull->no_rek }}</td>
                            <td>Rp. {{ number_format($pull->amount_pull)}} </td>
                            <td>{{date('Y-m-d', strtotime($pull->date_pull))}} </td>
                            <td> 
                                @if ($pull->pencairan == true)
                                   <span>Selesai</span>
                                @elseif ($pull->pencairan == false)
                                     <span>proses</span>
                                @endif
                            </td>
                            <td> 
                                @if ($pull->pencairan == 1)
                                  <span class="btn btn-success btn-sm disabled">Berhasil Mencairkan</span>
                                @elseif ($pull->pencairan == 0)
                                  <a href="{{ route('pull.active', $pull->id_pull)}}" class="badge badge-info" onclick="return confirm('Apakah Anda yakin Ingin Mencairkan?')">Cairkan</a>
                                @endif
                            </td>
                            <td>{{$pull->nameLevel }} </td>
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
