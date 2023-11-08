@extends('layouts.stisla')

@section('content')
<div class="main-content">
    <section class="section">
      {{-- <div class="section-header">
        
      </div> --}}
      <div class="row mt-5">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
             
            <div class="card-body">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <h5>HASIL UJIAN DISC</h5>
                      </div>
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table table-striped table-md text-center">
                            <tbody><tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>NISN</th>
                              <th>Asal Sekolah</th>
                              <th>Tanggal TES</th>
                              <th>Aksi</th>
                            </tr>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($data as $item)    
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $item->nama }}</td>
                              <td>{{ $item->nisn }}</td>
                              <td>{{ $item->namasekolah }}</td>
                              <td>{{ Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}</td>
                              <td>
                    
                                    <!-- Button trigger modal -->
                                    <a type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#staticBackdrop">
                                      Preview
                                    </a>

                              </td>
                            </tr>
                            @empty
                                
                            @endforelse
                          </tbody></table>
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


  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Informasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Untuk Melihat Hasil Ujian Test <b>DISC</b> Silahkan Hubungi Guru Bimbingan Konseling
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection
