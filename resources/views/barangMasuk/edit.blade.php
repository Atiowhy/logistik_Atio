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
                    <form action="{{ route('barangmasuk.update', $dataBarang->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mt-3">
                            <div class="col-md">
                                <div class="img-barang">
                                    <img src="{{ asset($dataBarang->foto ? 'images/' . $dataBarang->foto : 'https://placehold.co/150x150') }}"
                                        alt="foto">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang"
                                        value="{{ $dataBarang->nama_barang }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Asal Barang</label>
                                    <input type="text" class="form-control" name="origin"
                                        value="{{ $dataBarang->origin }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Qty</label>
                                    <input type="text" class="form-control" name="qty"
                                        value="{{ $dataBarang->qty }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="" class="form-label">Deskripsi Barang</label>
                                    <textarea name="deskripsi" class="form-control" cols="30" rows="10">{{ $dataBarang->deskripsi }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="" class="form-label">Foto</label>
                                <input type="file" class="form-control" name="foto">
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
