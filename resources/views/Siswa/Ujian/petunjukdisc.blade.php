@extends('layouts.stisla')

@section('content')
<div class="main-content">
    <section class="section">
      
        <div class="row justify-content-center mt-5">
            <div class="col-md-12 text-center">
                <h3 class="text-center">Petunjuk TEST DISC</h3>
            </div>
        </div>

        <div class="container mt-3 card" style="padding: 20px">
            <div class="row justify-content-center">
               <div class="col-md-12">
                <h5>Intruksi : Terdapat 24 soal, setiap nomor dibawah ini memuat 4 kalimat.Tugas anda adalah :</h5> <br>
                1. Pilih pada kolom dibawah huruf [P] disamping kalimat yang PALING menggambarkan diri anda. <br>
                2. Pilih pada kolom dibawah huruf [K] disamping kalimat yang KURANG mengambarkan diri anda. <br>
                    <div class="col-md-12 text-center">
                        <a class="btn btn-lg btn-primary mt-3" href="{{ route('ujian.disc') }}">Mulai Test</a>
                    </div>
               </div>
            </div>
        </div>
      
    </section>
  </div>
@endsection
