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
                          <h4>Edit Data {{ $user->username }}</h4>
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
                            <form action="{{ route('profilsiswa.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama User</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama User" value="{{ $user->nama }}">
                                        @if ($errors->has('nama'))
                                            <small class="form-text text-danger">{{ $errors->first('nama') }}</small>
                                        @endif
                                    </div>
                                </div>                              

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="jeniskelamin" id="" class="form-control">
                                            <option value="" selected>Pilih Jenis Kelamin</option>
                                            <option {{ $user->jeniskelamin == 'Laki-Laki' ? "selected" : "" }} value="Laki-Laki">Laki-Laki</option>
                                            <option {{ $user->jeniskelamin == 'Perempuan' ? "selected" : "" }} value="Perempuan">Perempuan</option>
                                        </select>
                                        @if ($errors->has('jeniskelamin'))
                                            <small class="form-text text-danger">{{ $errors->first('jeniskelamin') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" name="tanggallahir" class="form-control" placeholder="Tanggal Lahir" value="{{ $user->tanggallahir }}">
                                        @if ($errors->has('tanggallahir'))
                                        <small class="form-text text-danger">{{ $errors->first('tanggallahir') }}</small>
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
