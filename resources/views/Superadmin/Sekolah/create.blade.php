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
                          <h4>Tambah Data Sekolah</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sekolah.store') }}" method="POST">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                    <input type="text" name="namasekolah" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                    <div class="col-sm-12 col-md-7">
                                    <textarea name="alamat" class="form-control" cols="30" rows="10"></textarea>
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
