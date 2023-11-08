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
                                            <form action="{{ route('presentase.update', $presentase) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Presentase
                                                        Sistem</label>
                                                    <div class="input-group col-sm-12 col-md-7">
                                                        <input type="number" name="sistem"
                                                            class="form-control phone-number" min="0"
                                                            value="{{ old('sistem', $presentase->sistem) }}">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-percent"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Presentase
                                                        Afiliator</label>
                                                    <div class="input-group col-sm-12 col-md-7">
                                                        <input type="number" name="afiliator"
                                                            class="form-control phone-number" min="0"
                                                            value="{{ old('afiliator', $presentase->afiliator) }}">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-percent"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Presentase
                                                        Guru BK</label>
                                                    <div class="input-group col-sm-12 col-md-7">
                                                        <input type="number" name="gurubk"
                                                            class="form-control phone-number" min="0"
                                                            value="{{ old('gurubk', $presentase->gurubk) }}">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-percent"></i>
                                                            </div>
                                                        </div>
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
