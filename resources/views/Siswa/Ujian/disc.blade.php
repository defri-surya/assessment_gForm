@extends('layouts.stisla')

@section('content')
    <div class="main-content">
        <section class="section">

            <div class="row justify-content-center">
                <div class="col-md-10 text-center card" style="padding: 10px;">
                    <h4 class="text-center">TES DISC</h4>
                    <p>
                        1. Pilih pada kolom dibawah huruf [P] disamping kalimat yang PALING menggambarkan diri anda. <br>
                        2. Pilih pada kolom dibawah huruf [K] disamping kalimat yang KURANG mengambarkan diri anda. <br>
                    </p>
                </div>
            </div>
            <form action="{{ route('disc.store') }}" method="POST" onsubmit="return confirm('Anda Yakin ?')">
                @csrf
                @php
                    $no = 1;
                @endphp
                @forelse ($soal as $item)
                    <section class="card" style="padding: 20px">
                        <div class="row mb-2 ">
                            <div class="col-md-2 col-2 text-center">{{ $no++ }}</div>
                            <div class="col-md-5 col-7">
                                <h6>Gambaran Diri</h6>
                                {{ $item->pilihan_a }}<br>
                                {{ $item->pilihan_b }}<br>
                                {{ $item->pilihan_c }}<br>
                                {{ $item->pilihan_d }}
                            </div>
                            <div class="col-md-1 text-center col-1">
                                <h6>P</h6>
                                <input type="radio" name="{{ $item->id }}M" value="{{ $item->keymost_a }}" required />
                                <br>
                                <input type="radio" name="{{ $item->id }}M" value="{{ $item->keymost_b }}" required />
                                <br>
                                <input type="radio" name="{{ $item->id }}M" value="{{ $item->keymost_c }}"
                                    required /> <br>
                                <input type="radio" name="{{ $item->id }}M" value="{{ $item->keymost_d }}"
                                    required />
                            </div>
                            <div class="col-md-1 text-center col-1">
                                <h6>K</h6>
                                <input type="radio" name="{{ $item->id }}L" value="{{ $item->keylest_a }}"
                                    required /> <br>
                                <input type="radio" name="{{ $item->id }}L" value="{{ $item->keylest_b }}"
                                    required /> <br>
                                <input type="radio" name="{{ $item->id }}L" value="{{ $item->keylest_c }}"
                                    required /> <br>
                                <input type="radio" name="{{ $item->id }}L" value="{{ $item->keylest_d }}"
                                    required /> <br>
                            </div>
                        </div>
                    </section>
                @empty
                @endforelse

                <div class="col-md-12 text-center">
                    <button class="btn btn-lg btn-primary">Simpan</button>
                </div>

            </form>


        </section>
    </div>
@endsection
