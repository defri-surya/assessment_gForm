@extends('layouts.stisla')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Sekolah</h1>
      </div>
      <div class="row">
        <div class="col-lg-5 col-md-5 col-5 col-sm-5">
          <div class="card">
              {{-- <div class="card-header">
                  <div class="col-md-8">
                      <a class="btn btn-primary" href="{{ route('sekolah.create') }}">Tambah Data</a>
                  </div>
                  <div class="col-md-4">
                    <form method="GET" action="{{ route('sekolah.index') }}">
                        <div class="input-group">
                          <input type="text" name="cari" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                    </form>
                  </div>
              </div> --}}
            <div class="card-body">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Kategori Tes</h4>
                      </div>
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table table-striped table-md">
                            <tbody><tr>
                              <th>No</th>
                              <th>Nama Kategori Tes</th>
                              {{-- <th>Aksi</th> --}}
                            </tr>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($data as $item => $kategori)    
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $kategori->namakategori }}</td>
                              {{-- <td>
                                    <form method="POST" action="{{ route('kategori.destroy', $kategori) }}">
                                         @method('DELETE')
                                         @csrf
                                         <a class="btn btn-icon btn-primary" href="{{ route('kategori.edit', $kategori) }}"><i class="far fa-edit"></i></a>
                                        <button class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                                    </form>
                            </td> --}}
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
        <div class="col-lg-7 col-md-7 col-7 col-sm-7">
          <div class="card">
            <div class="card-header">
                <div class="col-md-8">
                    <h4>Tambah Data Kategori</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md col-12 col-md-12 col-lg-12">Nama Kategori</label>
                                <div class="col-sm-12 col-md-12">
                                     <input type="text" name="namakategori" class="form-control" placeholder="Nama Kategori Tes">
                                     @if ($errors->has('namakategori'))
                                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('namakategori') }}</small>
                                    @endif
                                </div>
                            </div>
                            <button class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
