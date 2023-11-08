@extends('layouts.stisla')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Riwayat</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-4">
                                <form method="GET" action="{{ route('camabas.index') }}">
                                    <div class="input-group">
                                        <input type="text" name="cari" class="form-control" placeholder="Cari Nama">
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
                                    <div class="card-header">
                                        <h4>Daftar Camaba</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <tbody>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Asal Sekolah</th>
                                                        <th>Nama Kampus</th>
                                                        <th>Jurusan</th>
                                                        <th>Biaya</th>
                                                        <th>Fee</th>
                                                        {{-- <th>Aksi</th> --}}
                                                    </tr>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @forelse ($data as $item => $user)
                                                        @php
                                                            $users = App\User::where('id', $user->user_id)->first();
                                                            $camaba = App\Camaba::where('id', $user->camaba_id)->first();
                                                            $sekolah = App\sekolah::where('id', $users->sekolahid)->first();
                                                            $kampus = App\Kampus::where('id', $camaba->kampus_id)->first();
                                                            $jurusan = App\Jurusan::where('id', $camaba->jurusan_id)->first();
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $users->nama }}</td>
                                                            <td>{{ $sekolah->namasekolah }}</td>
                                                            <td>{{ $kampus->nama_kampus }}</td>
                                                            <td>{{ $jurusan->nama_jurusan }}</td>
                                                            <td>Rp. {{ number_format($camaba->biaya) }}</td>
                                                            <td style="color: rgb(8, 180, 8)">Rp.
                                                                {{ number_format($user->fee_bk) }}
                                                            </td>
                                                            {{-- <td>
                                                                @if ($user->kampus_id == null || $user->jurusan_id == null || $user->biaya == null)
                                                                    <a class="btn btn-icon btn-primary"
                                                                        href="{{ route('firstedit', $user) }}"><i
                                                                            class="fas fa-arrow-right"></i></a>
                                                                @else
                                                                    <a class="btn btn-icon btn-primary"
                                                                        href="{{ route('camabas.edit', $user) }}"><i
                                                                            class="fas fa-arrow-right"></i></a>
                                                                @endif
                                                            </td> --}}
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
