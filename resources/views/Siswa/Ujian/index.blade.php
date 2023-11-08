@extends('layouts.stisla')

@section('content')
    <div class="main-content">
        <section class="section">
            {{-- <div class="section-header">
            
      </div> --}}
            <div class="row justify-content-center mt-5">
                <div class="col-md-12 text-center">
                    {{-- <h4 class="text-center">Silahkan Pilih Tipe Test Berdasarkan Petunjuk Guru BK</h4> --}}
                    <h4 class="text-center">Selamat Mengerjakan</h4>
                </div>
            </div>

            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <img src="{{ asset('assets') }}/disc1.png" width="330" class="img-fluid" alt="">
                        <div class="row mt-3">
                            <div class="col-md-12 text-center">
                                @empty($cek)
                                    <a href="{{ route('ujian', 'disc') }}" class="btn btn-primary"
                                        style="border-radius: 15px; background: #f08519;">Start Assessment</a>
                                @endempty
                                @isset($cek)
                                    <h6>Anda Sudah Melakukan Ujian DISC</h6>
                                @endisset
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 text-center">
                        <img src="{{ asset('assets') }}/dcm1.png" width="330" class="img-fluid" alt="">
                        <div class="row mt-3">
                            <div class="col-md-12 text-center">
                                <a href="{{ route('ujian.dcm') }}" class="btn btn-primary"
                                    style="border-radius: 15px; background: #f08519;">Start Assessment</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

        </section>
    </div>
@endsection
