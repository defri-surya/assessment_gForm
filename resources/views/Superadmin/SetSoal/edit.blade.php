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
                          <h4>Edit Setting Disc</h4>
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
                            <form action="{{ route('setsoal.update', $setsoal) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                    <select name="sekolahid" id="" class="form-control">
                                        <option value="" selected>Pilih Sekolah</option>
                                        @forelse ($sekolah as $item)
                                            <option {{ $setsoal->sekolahid == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->namasekolah }}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori Tes</label>
                                    <div class="col-sm-12 col-md-7">
                                    <select name="kategorisoalid" id="" class="form-control">
                                        <option value="" selected>Pilih Kategori Soal</option>
                                        @forelse ($kategori as $item)
                                            <option {{ $setsoal->kategorisoalid == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->namakategori }}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                    <select name="status" id="" class="form-control">
                                        <option value="" selected>Pilih Status</option>
                                            <option {{ $setsoal->status == 'aktif' ? "selected" : "" }} value="aktif">Aktif</option>
                                            <option {{ $setsoal->status == 'pasif' ? "selected" : "" }} value="pasif">Pasif</option>
                                    </select>
                                    </div>
                                </div>

                                

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Mulai</label>
                                    <div class="col-sm-12 col-md-7">
                                    <input type="date" name="tanggalmulai" class="form-control" placeholder="Tanggal Mulai Aktif" value="{{ $setsoal->tanggalmulai }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Selesai</label>
                                    <div class="col-sm-12 col-md-7">
                                    <input type="date" name="tanggalselesai" class="form-control" placeholder="Tanggal Akhir Selesai" value="{{ $setsoal->tanggalselesai }}">
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
