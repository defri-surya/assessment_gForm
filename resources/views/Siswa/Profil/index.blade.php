@extends('layouts.stisla')

@section('content')
<div class="main-content">
    <section class="section">
      

      <div class="col-12 mb-4">
        <div class="hero bg-primary text-white">
          <div class="hero-inner">
            <h2>Halo, {{ auth()->user()->nama }}</h2>
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture" width="100px">
            <p class="lead"><b>{{ auth()->user()->role }}</b></p>
            <div class="author-box-description">
              <div class="row">
                  <div class="col-md-3">Username</div><div class="col-md-9"> : {{ auth()->user()->username }}</div>
                  <div class="col-md-3">Jenis Kelamin</div><div class="col-md-9"> : {{ auth()->user()->jeniskelamin }}</div>
                  <div class="col-md-3">Tanggal Lahir</div><div class="col-md-9"> : {{ Carbon\Carbon::parse(auth()->user()->tanggallahir)->isoFormat('D MMMM Y') }}</div>
                  <div class="col-md-3">NISN</div><div class="col-md-9"> : {{ auth()->user()->nisn }}</div>

              </div>
            </div>
            <div class="mt-4">
              <a href="{{ route('profilsiswa.edit', auth()->user()->id) }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Edit Account</a>
            </div>
          </div>
        </div>
      </div>
     
      
    </section>
  </div>
@endsection
