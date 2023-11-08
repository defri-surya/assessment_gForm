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
                                            <form action="{{ route('biaya.update', $data) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kampus</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <select name="kampus_id" id="" class="form-control">
                                                            <option value="" selected>Pilih Kampus</option>
                                                            @forelse ($kampus as $item)
                                                                <option
                                                                    {{ $data->kampus_id == $item->id ? 'selected' : '' }}
                                                                    value="{{ $item->id }}">{{ $item->nama_kampus }}
                                                                </option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jurusan</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <select name="jurusan_id" id="" class="form-control">
                                                            <option value="" selected>Pilih Jurusan</option>
                                                            @forelse ($jurusan as $item)
                                                                <option
                                                                    {{ $data->jurusan_id == $item->id ? 'selected' : '' }}
                                                                    value="{{ $item->id }}">{{ $item->nama_jurusan }}
                                                                </option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Biaya</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="number" min="0" name="biaya"
                                                            class="form-control" placeholder="Biaya"
                                                            value="{{ old('biaya', $data->biaya) }}">
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
