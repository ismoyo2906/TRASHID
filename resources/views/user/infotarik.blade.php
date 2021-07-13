@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-8">
            
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <span class="btn btn-primary btn-lg disabled mb-3 ml-3"><h5>Riwayat Penarikan</h5></span>
                    </div>
                    
                    <a href="{{ route('user.pdfFormPenarikan') }}" class="btn btn-primary float-right mb-3">Print <i class="fas fa-print"></i></a>
                    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('user.infortarik')}}">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search by tanggal" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md" id="datatable">
                           <thead>
                                <tr>
                                    <th>Nama nasabah</th>
                                    <th>Jumlah Penarikan</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pulls as $pull)
                                <tr>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>Rp. {{ number_format($pull->amount_pull)}}</td>
                                    <td>
                                    @if ($pull->pencairan == true)
                                        <span class="btn btn-success btn-sm disabled mb-3">Selesai</span>
                                     @elseif ($pull->pencairan == false)
                                          <span class="btn btn-danger btn-sm disabled">proses</span>
                                     @endif
                                    </td>
                                    <td>{{ $pull->date_pull->format('Y-m-d')}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" align="center">no data appears</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $pulls->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



