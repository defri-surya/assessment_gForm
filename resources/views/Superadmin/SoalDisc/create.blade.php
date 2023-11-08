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
                          <h4>Tambah Data Soal DISC</h4>
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
                            <form action="{{ route('soaldisc.store') }}" method="POST">
                                @csrf

                                <div class="form-group row mb-4 text-center justify-content-center mb-3">
                                    <label class="col-form-label text-md col-12 col-md-12 col-lg-12">Pilihan Soal Dan Kunci Jawaban 1</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="pilihan_a" class="form-control mb-1" placeholder="Pertanyaan" value="{{ old('pilihan_a') }}">
                                        <select name="keymost_a" class="form-control mb-1" id="">
                                            <option value="">Pilih Kunci Most</option>
                                            <option {{ old('keymost_a') == 'd' ? "selected" : "" }} value="d">D</option>
                                            <option {{ old('keymost_a') == 'i' ? "selected" : "" }} value="i">I</option>
                                            <option {{ old('keymost_a') == 's' ? "selected" : "" }} value="s">S</option>
                                            <option {{ old('keymost_a') == 'c' ? "selected" : "" }} value="c">C</option>
                                            <option {{ old('keymost_a') == '*' ? "selected" : "" }} value="*">*</option>
                                        </select>
                                        <select name="keylest_a" class="form-control mb-1" id="">
                                            <option value="">Pilih Kunci Lest</option>
                                            <option {{ old('keylest_a') == 'd' ? "selected" : "" }} value="d">D</option>
                                            <option {{ old('keylest_a') == 'i' ? "selected" : "" }} value="i">I</option>
                                            <option {{ old('keylest_a') == 's' ? "selected" : "" }} value="s">S</option>
                                            <option {{ old('keylest_a') == 'c' ? "selected" : "" }} value="c">C</option>
                                            <option {{ old('keylest_a') == '*' ? "selected" : "" }} value="*">*</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4 text-center justify-content-center mb-3">
                                    <label class="col-form-label text-md col-12 col-md-12 col-lg-12">Pilihan Soal Dan Kunci Jawaban 2</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="pilihan_b" class="form-control mb-1" placeholder="Pertanyaan" value="{{ old('pilihan_b') }}">
                                        <select name="keymost_b" class="form-control mb-1" id="">
                                            <option value="">Pilih Kunci Most</option>
                                            <option {{ old('keymost_b') == 'd' ? "selected" : "" }} value="d">D</option>
                                            <option {{ old('keymost_b') == 'i' ? "selected" : "" }} value="i">I</option>
                                            <option {{ old('keymost_b') == 's' ? "selected" : "" }} value="s">S</option>
                                            <option {{ old('keymost_b') == 'c' ? "selected" : "" }} value="c">C</option>
                                            <option {{ old('keymost_b') == '*' ? "selected" : "" }} value="*">*</option>
                                        </select>
                                        <select name="keylest_b" class="form-control mb-1" id="">
                                            <option value="">Pilih Kunci Lest</option>
                                            <option {{ old('keylest_b') == 'd' ? "selected" : "" }} value="d">D</option>
                                            <option {{ old('keylest_b') == 'i' ? "selected" : "" }} value="i">I</option>
                                            <option {{ old('keylest_b') == 's' ? "selected" : "" }} value="s">S</option>
                                            <option {{ old('keylest_b') == 'c' ? "selected" : "" }} value="c">C</option>
                                            <option {{ old('keylest_b') == '*' ? "selected" : "" }} value="*">*</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4 text-center justify-content-center mb-3">
                                    <label class="col-form-label text-md col-12 col-md-12 col-lg-12">Pilihan Soal Dan Kunci Jawaban 3</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="pilihan_c" class="form-control mb-1" placeholder="Pertanyaan" value="{{ old('pilihan_c') }}">
                                        <select name="keymost_c" class="form-control mb-1" id="">
                                            <option value="">Pilih Kunci Most</option>
                                            <option {{ old('keymost_c') == 'd' ? "selected" : "" }} value="d">D</option>
                                            <option {{ old('keymost_c') == 'i' ? "selected" : "" }} value="i">I</option>
                                            <option {{ old('keymost_c') == 's' ? "selected" : "" }} value="s">S</option>
                                            <option {{ old('keymost_c') == 'c' ? "selected" : "" }} value="c">C</option>
                                            <option {{ old('keymost_c') == '*' ? "selected" : "" }} value="*">*</option>
                                        </select>
                                        <select name="keylest_c" class="form-control mb-1" id="">
                                            <option value="">Pilih Kunci Lest</option>
                                            <option {{ old('keylest_c') == 'd' ? "selected" : "" }} value="d">D</option>
                                            <option {{ old('keylest_c') == 'i' ? "selected" : "" }} value="i">I</option>
                                            <option {{ old('keylest_c') == 's' ? "selected" : "" }} value="s">S</option>
                                            <option {{ old('keylest_c') == 'c' ? "selected" : "" }} value="c">C</option>
                                            <option {{ old('keylest_c') == '*' ? "selected" : "" }} value="*">*</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4 text-center justify-content-center mb-3">
                                    <label class="col-form-label text-md col-12 col-md-12 col-lg-12">Pilihan Soal Dan Kunci Jawaban 4</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="pilihan_d" class="form-control mb-1" placeholder="Pertanyaan" value="{{ old('pilihan_d') }}">
                                        <select name="keymost_d" class="form-control mb-1" id="">
                                            <option value="">Pilih Kunci Most</option>
                                            <option {{ old('keymost_d') == 'd' ? "selected" : "" }} value="d">D</option>
                                            <option {{ old('keymost_d') == 'i' ? "selected" : "" }} value="i">I</option>
                                            <option {{ old('keymost_d') == 's' ? "selected" : "" }} value="s">S</option>
                                            <option {{ old('keymost_d') == 'c' ? "selected" : "" }} value="c">C</option>
                                            <option {{ old('keymost_d') == '*' ? "selected" : "" }} value="*">*</option>
                                        </select>
                                        <select name="keylest_d" class="form-control mb-1" id="">
                                            <option value="">Pilih Kunci Lest</option>
                                            <option {{ old('keylest_d') == 'd' ? "selected" : "" }} value="d">D</option>
                                            <option {{ old('keylest_d') == 'i' ? "selected" : "" }} value="i">I</option>
                                            <option {{ old('keylest_d') == 's' ? "selected" : "" }} value="s">S</option>
                                            <option {{ old('keylest_d') == 'c' ? "selected" : "" }} value="c">C</option>
                                            <option {{ old('keylest_d') == '*' ? "selected" : "" }} value="*">*</option>
                                        </select>
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
