@extends('layouts.stisla')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Camaba</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-8">
                                <a class="btn btn-primary" href="{{ route('camabas.create') }}">Tambah Data</a>
                            </div>
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
                                                        <th>Nama Siswa</th>
                                                        <th>Asal Sekolah</th>
                                                        <th>Nama Kampus</th>
                                                        <th>Jurusan</th>
                                                        <th>Biaya</th>
                                                        <th>Afiliator</th>
                                                        <th>Fee</th>
                                                    </tr>

                                                    @forelse ($data as $item => $user)
                                                        @php
                                                            $users = App\User::where('id', $user->user_id)->first();
                                                            $sekolah = App\sekolah::where('id', $users->sekolahid)->first();
                                                            $kampus = App\Kampus::where('id', $user->kampus_id)->first();
                                                            $jurusan = App\Jurusan::where('id', $user->jurusan_id)->first();
                                                            $afiliator = App\User::where('id', $user->afiliator_id)->first();
                                                            $fee = App\ShareBK::where('camaba_id', $user->id)->first();
                                                            // dd($fee);
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $users->nama }}</td>
                                                            <td>{{ $sekolah->namasekolah }}</td>
                                                            @if ($user->kampus_id == null)
                                                                <td>-</td>
                                                            @else
                                                                <td>{{ $kampus->nama_kampus }}</td>
                                                            @endif
                                                            @if ($user->jurusan_id == null)
                                                                <td>-</td>
                                                            @else
                                                                <td>{{ $jurusan->nama_jurusan }}</td>
                                                            @endif
                                                            @if ($user->biaya == null)
                                                                <td>-</td>
                                                            @else
                                                                <td>Rp. {{ number_format($user->biaya) }}</td>
                                                            @endif
                                                            <td>{{ $afiliator->nama }}</td>
                                                            <td style="color: rgb(8, 180, 8)">Rp.
                                                                {{ number_format($fee['fee_bk']) }}
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
