@extends('admin.Tadmin.master')

@section('tittle', 'Data Pengepul')

@section('content')
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">

        <div class="row">
            <form action="#" method="GET" class="form-inline mr-auto ml-5">
                <div class="search-element mt-3">
                    <input class="form-control" type="text" name="keyword" value="{{ old('keyword')}}"
                        placeholder="Search name" aria-label="Search" data-width="250">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    <div class="search-backdrop"></div>
                </div>
            </form>

            <a href="{{ route('collector.create') }}" class="btn btn-primary mr-5 mt-3">Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th>Nomor Rek</th>
                            <th>Nama Pengepul</th>
                            <th>Nama Perusahan</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Action</th>
                        </tr>

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

        <div class="card-footer text-right">
            <nav class="d-inline-block">
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection

@push('script')
  @include('sweetalert::alert')
@endpush