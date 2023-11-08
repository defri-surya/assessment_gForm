@extends('layouts.stisla')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Edit Data</h4>
                                        </div>

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="card-body">
                                            <form action="{{ route('kampus.update', $data) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                                        Kampus</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="nama_kampus" class="form-control"
                                                            placeholder="Nama Kampus"
                                                            value="{{ old('nama_kampus', $data->nama_kampus) }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <textarea class="form-control" name="alamat" style="height: 100px" placeholder="Alamat Kampus">{{ old('alamat', $data->alamat) }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor
                                                        Telepon</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="number" name="no_tlp" class="form-control"
                                                            value="{{ old('no_tlp', $data->no_tlp) }}"
                                                            placeholder="Nomor Telepon">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <div class="col-sm-12 col-md-12 text-center">
                                                        <button class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
