@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-8">
            
            <div class="card">
                <div class="card-body">
                    <span class="btn btn-primary btn-lg disabled mb-3"><h5>Riwayat Penarikan</h5></span>
                    <a href="{{ route('user.pdfFormPenarikan') }}" class="btn btn-primary float-right">Print <i class="fas fa-print"></i></a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md" id="datatable">
                           <thead>
                                <tr>
                                    <th>Nama nasabah</th>
                                    <th>Jumlah Penarikan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pulls as $pull)
                                <tr>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>Rp. {{ number_format($pull->amount_pull)}}</td>
                                    <td>{{ $pull->date_pull->format('Y-m-d')}}</td>
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


