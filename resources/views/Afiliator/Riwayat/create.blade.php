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
                                            <h4>Tambah Data Biaya</h4>
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

                                        @php
                                            $users = App\User::where('id', $data->user_id)->first();
                                            $sekolah = App\sekolah::where('id', $users->sekolahid)->first();
                                        @endphp

                                        <div class="card-body">
                                            <form action="{{ route('storeedit', $data) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                                        Siswa</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" class="form-control" placeholder="Nama Siswa"
                                                            value="{{ old('nama', $data->nama) }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Asal
                                                        Sekolah</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" class="form-control"
                                                            value="{{ $sekolah->namasekolah }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kampus</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <select name="kampus_id" id="kampus"class="form-control">
                                                            <option value="" selected>Pilih Kampus</option>
                                                            @forelse ($kampus as $item)
                                                                <option
                                                                    {{ old('kampus_id') == $item->id ? 'selected' : '' }}
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
                                                        <select class="form-control" name="jurusan_id" id="jurusan">
                                                            <option value="">Pilih Jurusan</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label
                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Biaya</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="biaya" class="form-control"
                                                            id="biaya" readonly>
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
        $(document).ready(function() {
            $('#kampus').change(function() {
                var kampusId = $(this).val();
                if (kampusId) {
                    $.ajax({
                        url: '/get-jurusan-bk/' + kampusId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#jurusan').empty();
                            $('#jurusan').append(
                                '<option value="">Pilih Jurusan</option>');
                            $.each(data, function(key, value) {
                                $('#jurusan').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#jurusan').empty();
                    $('#biaya').val('');
                }
            });

            $('#jurusan').change(function() {
                var jurusanId = $(this).val();
                if (jurusanId) {
                    $.ajax({
                        url: '/get-biaya/' + jurusanId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#biaya').val(data);
                        }
                    });
                } else {
                    $('#biaya').val('');
                }
            });
        });
    </script>
@endsection
