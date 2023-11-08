@extends('layouts.stisla')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Selamat Datang {{ auth()->user()->nama }}
                    @can('isSuperadmin')
                        Administrator
                    @elsecan('isGuruBK')
                        Guru Bimbingan Konseling {{ auth()->user()->sekolah['namasekolah'] }}
                    @endcan
                </h1>
            </div>
            <div class="row justify-content-center">
                @can('isSuperadmin')
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>User</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totaluser }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Siswa Aktif</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalsiswaaktif }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Sekolah</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalsekolah }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Siswa</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalsiswa }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-circle"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Report Test</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalhasil }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan

                @can('GuruBK')
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Siswa Aktif</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalsiswaaktif }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Siswa</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalsiswa }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-circle"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Report Test</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalhasil }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan

                @can('isAfiliator')
                    @php
                        
                    @endphp
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Siswa Aktif</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalsiswaaktif }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Siswa</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalsiswa }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-circle"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Report Test</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalhasil }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Info Administrator
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">Nama</div>
                                <div class="col-md-8">: {{ auth()->user()->nama }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Username</div>
                                <div class="col-md-8">: {{ auth()->user()->username }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Role</div>
                                <div class="col-md-8">: {{ auth()->user()->role }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
