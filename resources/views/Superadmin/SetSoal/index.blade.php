@extends('layouts.stisla')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Setting Soal DISC</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-body">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <div class="col-md-8">
                          <a class="btn btn-primary" href="{{ route('setsoal.create') }}">Tambah Setting</a>
                      </div>
                      <div class="col-md-4">
                        <form method="GET" action="{{ route('setsoal.index') }}">
                            <div class="input-group">
                              <select name="sekolahid" id="sekolah" onchange="return submit()" class="form-control">
                                <option value="">— Semua Sekolah —</option>
                                @foreach($sekolah as $index => $sekolah)
                                <option value="{{ $sekolah->id }}" @if($sekolah->id == request('sekolahid'))
                                    selected @endif>{{ $sekolah->namasekolah }}</option>
                                @endforeach
                            </select>
                              </div>
                            </div>
                        </form>
                      </div>
                      </div>
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table table-striped table-md">
                            <tbody><tr>
                              <th>No</th>
                              <th>Nama Sekolah</th>
                              <th>Kategori Soal</th>
                              <th>Status</th>
                              <th>Tanggal Mulai</th>
                              <th>Tanggal Selesai</th>
                              <th>Aksi</th>
                            </tr>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($data as $item => $setsoal)    
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $setsoal->sekolah['namasekolah'] }}</td>
                              <td>{{ $setsoal->kategori['namakategori'] }}</td>
                              <td>{{ $setsoal->status }}</td>
                              <td>{{ Carbon\Carbon::parse($setsoal->tanggalmulai)->isoFormat('D MMMM Y') }}</td>
                              <td>{{ Carbon\Carbon::parse($setsoal->tanggalselesai)->isoFormat('D MMMM Y') }}</td>
                              <td>
                                    <form method="POST" action="{{ route('setsoal.destroy', $setsoal) }}" onsubmit="return confirm('Hapus Data, Anda Yakin ?')">
                                         @method('DELETE')
                                         @csrf
                                         <a class="btn btn-icon btn-primary" href="{{ route('setsoal.edit', $setsoal) }}"><i class="far fa-edit"></i></a>
                                        <button class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                                    </form>
                            </td>
                            </tr>
                            @empty
                                
                            @endforelse
                          </tbody></table>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                        <nav class="d-inline-block">
                          <ul class="pagination mb-0">
                            {{ $data->links() }}
                          </ul>
                        </nav>
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
