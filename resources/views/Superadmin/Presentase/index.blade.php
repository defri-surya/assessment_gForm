@extends('layouts.stisla')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Presentase</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        @if ($data->count() < 1)
                            <div class="card-header">
                                <div class="col-md-12">
                                    <a class="btn btn-primary" href="{{ route('presentase.create') }}">Tambah Data</a>
                                </div>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Presentase</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <tbody>
                                                    <tr>
                                                        <th>Sistem</th>
                                                        <th>Afiliator</th>
                                                        <th>Guru BK</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    @forelse ($data as $item => $user)
                                                        <tr>
                                                            <td>{{ $user->sistem }} %</td>
                                                            <td>{{ $user->afiliator }} %</td>
                                                            <td>{{ $user->gurubk }} %</td>
                                                            <td>
                                                                <a class="btn btn-icon btn-primary"
                                                                    href="{{ route('presentase.edit', $user) }}"><i
                                                                        class="far fa-edit"></i></a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
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
