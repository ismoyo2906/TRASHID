@extends('admin.Tadmin.master')

@section('tittle', 'Data Sampah')

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

            <a href="{{ route('trash.create') }}" class="btn btn-primary mr-5 mt-3">Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th>Nama Sampah</th>
                            <th>Harga Sampah</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>

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
