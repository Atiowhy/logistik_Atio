@extends('layout.app')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg">
            <div class="row">

                <!-- stock Card -->
                <h3>Stock Barang</h3>
                @foreach ($datas as $key => $data)
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Action</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('dashboard.show', $data->id) }}">Detail</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-body mb-3">
                                <h5 class="card-title">{{ $data->nama_barang }} <span>| {{ $data->origin }}</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('images/' . $data->foto) }}" width="50" alt="foto"
                                            class="rounded-circle">
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $data->qty }} Qty
                                        </h6>
                                        <span class="text-success small pt-1 fw-bold">{{ $data->origin }}</span> <span
                                            class="text-muted small pt-2 ps-1">{{ $data->kd_barang }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->
                @endforeach


                <!-- barang masuk Card -->
                <h3>Barang Masuk</h3>
                @foreach ($dataIns as $key => $dataIn)
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">{{ $dataIn->items->nama_barang }} <span>|
                                        {{ $dataIn->kd_barang }}</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('images/' . $dataIn->items->foto) }}" width="50"
                                            alt="foto" class="rounded-circle">
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $dataIn->qty }} Items</h6>
                                        <span class="text-success small pt-1 fw-bold">{{ $dataIn->origin }}</span> <span
                                            class="text-muted small pt-2 ps-1">{{ $dataIn->tanggal_masuk }}</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->
                @endforeach

                <!-- barang keluar Card -->
                <h3>Barang Keluar</h3>
                @foreach ($dataOuts as $key => $dataOut)
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">{{ $dataOut->items->nama_barang }} <span>|
                                        {{ $dataOut->kd_barang }}</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('images/' . $dataOut->items->foto) }}" width="50"
                                            alt="foto" class="rounded-circle">
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $dataOut->qty }} Items</h6>
                                        <span class="text-success small pt-1 fw-bold">{{ $dataOut->destination }}</span>
                                        <span class="text-muted small pt-2 ps-1">{{ $dataOut->tanggal_keluar }}</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->
                @endforeach

                <div class="pagination d-flex justify-content-center mb-3">
                    {{ $datas }}
                </div>

            </div>
        </div><!-- End Left side columns -->

    </div>
@endsection
