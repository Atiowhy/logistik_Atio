@extends('layout.app')
@section('content')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="table table-responsive p-3 mt-3">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Qty</th>
                                    <th>Origin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $key => $data)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $data->kd_barang }}</td>
                                        <td>{{ $data->nama_barang }}</td>
                                        <td>{{ $data->qty }}</td>
                                        <td>{{ $data->origin }}</td>
                                        <td class="d-flex gap-2">
                                            <a href="{{ route('barangmasuk.edit', $data->id) }}"
                                                class="btn btn-warning"><span class="bi bi-pencil"></span></a>
                                            <a href="{{ route('barangmasuk.show', $data->id) }}" class="btn btn-info"><span
                                                    class="bi bi-eye"></span></a>
                                            <form action="{{ route('barangmasuk.destroy', $data->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger"><span class="bi bi-trash"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
