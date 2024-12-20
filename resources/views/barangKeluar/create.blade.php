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
                    <form action="{{ route('barangkeluar.store') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="row mt-3">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="" class="form-label">Kode Barang</label>
                                    <select name="kd_barang" class="form-control" id="">
                                        <option value="">--Pilih kd_barang--</option>
                                        @foreach ($dataBarang as $data)
                                            <option value="{{ $data->kd_barang }}">{{ $data->kd_barang }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Destinasi</label>
                                    <input type="text" class="form-control" name="destination">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Qty</label>
                                    <input type="text" class="form-control" name="qty">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="" class="form-label">Tanggal Keluar</label>
                                    <input type="date" class="form-control" name="tanggal_keluar">
                                </div>
                            </div>
                        </div>
                        <div class="btn-cta mt-3">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
