@extends('layouts.stisla')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Database Kepribadian</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
              <div class="card-header">
                  <div class="col-md-8">
                      <a class="btn btn-primary" href="{{ route('kepribadian.create') }}">Tambah Data</a>
                  </div>
                  <div class="col-md-4">
                    {{-- <form method="GET" action="{{ route('setsoal.index') }}">
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
                    </form> --}}
                  </div>
              </div>
            <div class="card-body">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Database Kepribadian DISC</h4>
                      </div>
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table table-striped table-md">
                            <tbody><tr>
                              <th>No</th>
                              <th>Tipe Kepribadian</th>
                              <th>Sifat</th>
                              <th>Deskripsi</th>
                              <th>Rekomendasi Pekerjaan</th>
                              <th>Rekomendasi Jurusan</th>
                              <th>Aksi</th>
                            </tr>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($data as $item => $kepribadian)    
                            <tr>
                              <td>{{ $data->firstItem() + $item }}</td>
                              <td>{{ $kepribadian->typekepribadian }}</td>
                              <td>{!! \Illuminate\Support\Str::limit($kepribadian->sifat, 20, $end='...') !!}</td>
                              <td>{!! \Illuminate\Support\Str::limit($kepribadian->deskripsi, 20, $end='...') !!}</td>
                              <td>{!! \Illuminate\Support\Str::limit($kepribadian->rekomendasipekerjaan, 20, $end='...') !!}</td>
                              <td>{!! \Illuminate\Support\Str::limit($kepribadian->rekomendasijurusan, 20, $end='...') !!}</td>
                              <td>
                                    <form method="POST" action="{{ route('kepribadian.destroy', $kepribadian) }}" onsubmit="return confirm('Hapus Data, Anda Yakin ?')">
                                         @method('DELETE')
                                         @csrf
                                         <a class="btn btn-icon btn-primary" href="{{ route('kepribadian.edit', $kepribadian) }}"><i class="far fa-edit"></i></a>
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
