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
                    <div class="box d-flex p-3">
                        <div class="img-barang border-end border-2 border-dark">
                            <img src="{{ asset('images/' . $data->foto) }}" width="200" alt="">
                        </div>
                        <div class="title ms-3">
                            <h3>{{ $data->nama_barang }}</h3>
                            <div class="info lh-1">
                                <h5 class="text-primary mt-0 mb-1">Kode Barang : {{ $data->kd_barang }}</h5>
                                <p>{{ $data->origin }}</p>
                                <p>Stock : {{ $data->qty }}</p>
                            </div>
                            <h5>{{ $data->deskripsi }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection