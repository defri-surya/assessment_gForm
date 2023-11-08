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
                                            <h4>Tambah Data User</h4>
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
                                            <form action="{{ route('user.store') }}" method="POST">
                                                @csrf
                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                                        User</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="nama" class="form-control"
                                                            placeholder="Nama User" value="{{ old('nama') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="username" class="form-control"
                                                            placeholder="Username User" value="{{ old('username') }}">
                                                        {{-- @if ($errors->has('username'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('username') }}</small>
                                    @endif --}}
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Asal
                                                        Sekolah</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <select name="sekolahid" id="" class="form-control">
                                                            <option value="" selected>Pilih Sekolah</option>
                                                            @forelse ($sekolah as $item)
                                                                <option
                                                                    {{ old('sekolahid') == $item->id ? 'selected' : '' }}
                                                                    value="{{ $item->id }}">{{ $item->namasekolah }}
                                                                </option>
                                                            @empty
                                                            @endforelse
                                                        </select>
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
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">role</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="role" class="form-control"
                                                            value="siswa" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal
                                                        Lahir</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="date" name="tanggallahir" class="form-control"
                                                            placeholder="Tanggal Lahir" value="{{ old('tanggallahir') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NISN</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="nisn" class="form-control"
                                                            placeholder="Opsional NISN User" value="{{ old('nisn') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIP</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="nip" class="form-control"
                                                            placeholder="Opsional NIP User" value="{{ old('nip') }}">
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
