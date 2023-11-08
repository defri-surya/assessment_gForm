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
                                            <h4>Tambah Data Siswa</h4>
                                        </div>

                                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}


                                        <div class="card-body">
                                            <form action="{{ route('siswa.store') }}" method="POST">
                                                @csrf
                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                                        Siswa</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="nama" class="form-control"
                                                            placeholder="Nama Siswa" value="{{ old('nama') }}">
                                                        @if ($errors->has('nama'))
                                                            <small id="emailHelp"
                                                                class="form-text text-danger">{{ $errors->first('nama') }}</small>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                                        Kelamin</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <select name="jeniskelamin" id="" class="form-control">
                                                            <option value="" selected>Pilih Jenis Kelamin</option>
                                                            <option
                                                                {{ old('jeniskelamin') == 'Laki-Laki' ? 'selected' : '' }}
                                                                value="Laki-Laki">Laki-Laki</option>
                                                            <option
                                                                {{ old('jeniskelamin') == 'Perempuan' ? 'selected' : '' }}
                                                                value="Perempuan">Perempuan</option>
                                                        </select>
                                                        @if ($errors->has('jeniskelamin'))
                                                            <small id="emailHelp"
                                                                class="form-text text-danger">{{ $errors->first('jeniskelamin') }}</small>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal
                                                        Lahir</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="date" name="tanggallahir" class="form-control"
                                                            placeholder="Tanggal Lahir" value="{{ old('tanggallahir') }}">
                                                        @if ($errors->has('tanggallahir'))
                                                            <small id="emailHelp"
                                                                class="form-text text-danger">{{ $errors->first('tanggallahir') }}</small>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NISN</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="nisn" class="form-control"
                                                            placeholder="NISN Siswa" value="{{ old('nisn') }}">
                                                        @if ($errors->has('nisn'))
                                                            <small id="emailHelp"
                                                                class="form-text text-danger">{{ $errors->first('nisn') }}</small>
                                                        @endif
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
