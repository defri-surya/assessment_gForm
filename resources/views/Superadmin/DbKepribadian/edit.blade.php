@extends('layouts.stisla')
@section('css')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection

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
                          <h4>Edit Data Kepribadian</h4>
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
                            <form action="{{ route('kepribadian.update', $kepribadian) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type Kepribadian</label>
                                    <div class="col-sm-12 col-md-7">
                                    <input type="text" name="typekepribadian" class="form-control" placeholder="D / I / S / C" value="{{ $kepribadian->typekepribadian }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sifat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="sifat">{{ $kepribadian->sifat }}</textarea>
                                    </div>
                                </div>

                                
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="deskripsi">{{ $kepribadian->deskripsi }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rekomendasi Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="rekomendasipekerjaan">{{ $kepribadian->rekomendasipekerjaan }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rekomendasi Jurusan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="rekomendasijurusan">{{ $kepribadian->rekomendasijurusan }}</textarea>
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

@section('js')
    <script>
        CKEDITOR.replace( 'sifat' );
        CKEDITOR.replace( 'deskripsi' );
        CKEDITOR.replace( 'rekomendasipekerjaan' );
        CKEDITOR.replace( 'rekomendasijurusan' );
    </script>
@endsection
