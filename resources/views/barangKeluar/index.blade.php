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
                                    <th>Qty</th>
                                    <th>Destinasi</th>
                                    <th>Tanggal Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $key => $data)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $data->items->kd_barang }}</td>
                                        <td>{{ $data->qty }}</td>
                                        <td>{{ $data->destination }}</td>
                                        <td>{{ $data->tanggal_keluar }}</td>
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
