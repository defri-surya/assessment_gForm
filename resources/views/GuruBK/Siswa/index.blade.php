@extends('layouts.stisla')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Siswa {{ $sekolah->namasekolah }}</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-4">
                                <a class="btn btn-primary" href="{{ route('siswa.create') }}">Tambah Data</a>
                            </div>
                            <div class="col-md-4">
                                <a class="btn btn-primary" href="{{ route('refresh') }}">Refresh</a>
                            </div>
                            <div class="col-md-4">
                                <form method="GET" action="{{ route('siswa.index') }}">
                                    <div class="input-group">
                                        <input type="text" name="cari" class="form-control"
                                            placeholder="Cari Nama / NISN">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    {{-- <div class="card-header">
                        <h4>Data Siswa</h4>
                      </div> --}}
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <tbody>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Username</th>
                                                        <th>Asal Sekolah</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @forelse ($data as $item => $siswa)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $siswa->nama }}</td>
                                                            <td>{{ $siswa->username }}</td>
                                                            <td>{{ $siswa->sekolah['namasekolah'] }}</td>
                                                            <td>{{ $siswa->status }}</td>
                                                            <td>
                                                                <form method="POST"
                                                                    action="{{ route('siswa.destroy', $siswa) }}"
                                                                    onsubmit="return confirm('Hapus Data, Anda Yakin ?')">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <a class="btn btn-icon btn-primary"
                                                                        href="{{ route('siswa.edit', $siswa) }}"><i
                                                                            class="far fa-edit"></i></a>
                                                                    <button class="btn btn-icon btn-danger"><i
                                                                            class="fas fa-times"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
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
