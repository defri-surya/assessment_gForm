@extends('layouts.stisla')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h5>Laporan Hasil Tes DISC</h5>
      </div>

        <div class="row mb-1" style="padding: 12px; background-color: white; ">
                {{-- <div class="col-md-12"> --}}
                    <div class="col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-md-4">Nama</div><div class="col-md-8">: <span style="color: blue; font-weight: bold">{{ $allreportdisc->nama }}</span></div>
                        </div>
                        <div class="row">
                                <div class="col-md-4">Jenis Kelamin</div><div class="col-md-8">: {{ $allreportdisc->jeniskelamin }}</div>
                        </div>
                        <div class="row">
                                <div class="col-md-4">Tanggal Lahir</div><div class="col-md-8">: {{ Carbon\Carbon::parse($allreportdisc->tanggallahir)->isoFormat('D MMMM Y') }}</div>
                        </div>
                    </div>
        
                    <div class="col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-md-4">Tanggal Tes</div><div class="col-md-8">: {{ $allreportdisc->created_at }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Asal Sekolah</div><div class="col-md-8">: {{ $allreportdisc->namasekolah }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">NISN</div><div class="col-md-8">: {{ $allreportdisc->nisn }}</div>
                        </div>
                    </div>
                {{-- </div>     --}}
        </div>


        <div class="row">
          <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Chart Most</h4>
                <div class="card-header-action">
                  <div class="btn-group">
                    {{-- <a href="#" class="btn btn-primary">Week</a>
                    <a href="#" class="btn">Month</a> --}}
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                      <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                          <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                          </div>
                      </div>
                      <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                          <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                      </div>
                  </div>
                <canvas id="myChart" height="320" width="530" class="chartjs-render-monitor" style="display: block; width: 265px; height: 160px;"></canvas>
                <div class="statistic-details mt-sm-4">
                  <div class="statistic-details-item">
                    <div class="detail-value">Graph 1 MOST</div>
                    <div class="detail-name">Mask Public Self</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Chart Lest</h4>
                <div class="card-header-action">
                  <div class="btn-group">
                    {{-- <a href="#" class="btn btn-primary">Week</a>
                    <a href="#" class="btn">Month</a> --}}
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                      <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                          <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                          </div>
                      </div>
                      <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                          <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                      </div>
                  </div>
                <canvas id="myChartLest" height="320" width="530" class="chartjs-render-monitor" style="display: block; width: 265px; height: 160px;"></canvas>
                <div class="statistic-details mt-sm-4">
                  <div class="statistic-details-item">
                    <div class="detail-value">GRAPH 2 LEST</div>
                    <div class="detail-name">Core Private Self</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Chart Diverent</h4>
                <div class="card-header-action">
                  <div class="btn-group">
                    {{-- <a href="#" class="btn btn-primary">Week</a>
                    <a href="#" class="btn">Month</a> --}}
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                      <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                          <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                          </div>
                      </div>
                      <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                          <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                      </div>
                  </div>
                <canvas id="myChartDif" height="320" width="530" class="chartjs-render-monitor" style="display: block; width: 265px; height: 160px;"></canvas>
                <div class="statistic-details mt-sm-4">
                  <div class="statistic-details-item">
                    <div class="detail-value">GRAPH 3 CHANGE</div>
                    <div class="detail-name">Mirror Perceived Self</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
   
        <div class="row">
            <div class="card col-md-12">
                <div class="card-header">
                  <h4>Kepribadian Saat di Publik</h4>
                </div>
                <div class="card-body">
                    @isset($kepmost)
                        <p>{!! $kepmost->sifat !!}</p>
                    @endisset
                    @empty($kepmost)
                        <span style="color: red; font-weight: bold;">NOT AVAILABLE</span>
                    @endempty
                </div>
                {{-- <div class="card-footer bg-whitesmoke">
                  Most
                </div> --}}
              </div>
        </div>
        <div class="row">
            <div class="card col-md-12">
                <div class="card-header">
                  <h4>Kepribadian Saat Mendapat Tekanan</h4>
                </div>
                <div class="card-body">
                    @isset($keplest)
                        <p>{!! $keplest->sifat !!}</p>
                    @endisset
                    @empty($keplest)
                        <span style="color: red; font-weight: bold;">NOT AVAILABLE</span>
                    @endempty
                </div>
                {{-- <div class="card-footer bg-whitesmoke">
                  Lest
                </div> --}}
              </div>
        </div>
        <div class="row">
            <div class="card col-md-12">
                <div class="card-header">
                  <h4>Kepribadian Asli</h4>
                </div>
                <div class="card-body">
                    @isset($kepdif)
                        <p>{!! $kepdif->sifat !!}</p>
                    @endisset
                    @empty($kepdif)
                        <span style="color: red; font-weight: bold;">NOT AVAILABLE</span>
                    @endempty
                </div>
                {{-- <div class="card-footer bg-whitesmoke">
                  Diference
                </div> --}}
              </div>
        </div>
        <div class="row">
            <div class="card col-md-12">
                <div class="card-header">
                  <h4>Deskripsi Kepribadian</h4>
                </div>
                <div class="card-body">
                    @isset($kepdif)
                        <p>{!! $kepdif->deskripsi !!}</p>
                    @endisset
                    @empty($kepdif)
                        <span style="color: red; font-weight: bold;">NOT AVAILABLE</span>
                    @endempty
                </div>
                {{-- <div class="card-footer bg-whitesmoke">
                  An
                </div> --}}
              </div>
        </div>
        <div class="row">
            <div class="card col-md-12">
                <div class="card-header">
                  <h4>Job Recommended</h4>
                </div>
                <div class="card-body">
                    @isset($kepdif)
                        <p>{!! $kepdif->rekomendasipekerjaan !!}</p>
                    @endisset
                    @empty($kepdif)
                        <span style="color: red; font-weight: bold;">NOT AVAILABLE</span>
                    @endempty
                </div>
                {{-- <div class="card-footer bg-whitesmoke">
                  This is card footer
                </div> --}}
              </div>
        </div>

        <div class="row">
          <div class="card col-md-12">
              <div class="card-header">
                <h4>Rekomendasi Jurusan</h4>
              </div>
              <div class="card-body">
                  @isset($kepdif)
                      <p>{!! $kepdif->rekomendasijurusan !!}</p>
                  @endisset
                  @empty($kepdif)
                      <span style="color: red; font-weight: bold;">NOT AVAILABLE</span>
                  @endempty
              </div>
              {{-- <div class="card-footer bg-whitesmoke">
                Diference
              </div> --}}
            </div>
      </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <button id="print" class="btn btn-primary">Print</button>
            </div>
        </div>

    </section>
  </div>
@endsection

@section('js')
    <script src="{{ asset('assets') }}/node_modules/chart.js"></script>
    <script>

        var data = <?php echo $most ?>;

        var statistics_chart = document.getElementById("myChart").getContext('2d');

        var myChart = new Chart(statistics_chart, {
        type: 'line',
        data: {
            labels: ["D", "I", "S", "C"],
            datasets: [{
            label: 'Most',
            data: data,
            borderWidth: 4,
            borderColor: '#6777ef',
            backgroundColor: 'transparent',
            pointBackgroundColor: '#fff',
            pointBorderColor: '#6777ef',
            pointRadius: 4
            }]
        },
        options: {
            legend: {
            display: false
            },
            scales: {
            yAxes: [{
                gridLines: {
                display: false,
                drawBorder: false,
                },
                ticks: {
                stepSize: 4
                }
            }],
            xAxes: [{
                gridLines: {
                color: '#fbfbfb',
                lineWidth: 1
                }
            }]
            },
        }
        });

        var datalest = <?php echo $lest ?>;

        var statistics_chart = document.getElementById("myChartLest").getContext('2d');

        var myChart = new Chart(statistics_chart, {
        type: 'line',
        data: {
            labels: ["D", "I", "S", "C"],
            datasets: [{
            label: 'Lest',
            data: datalest,
            borderWidth: 4,
            borderColor: '#6777ef',
            backgroundColor: 'transparent',
            pointBackgroundColor: '#fff',
            pointBorderColor: '#6777ef',
            pointRadius: 4
            }]
        },
        options: {
            legend: {
            display: false
            },
            scales: {
            yAxes: [{
                gridLines: {
                display: false,
                drawBorder: false,
                },
                ticks: {
                stepSize: 4
                }
            }],
            xAxes: [{
                gridLines: {
                color: '#fbfbfb',
                lineWidth: 1
                }
            }]
            },
        }
        });

        var datadif = <?php echo $dif ?>;

        var statistics_chart = document.getElementById("myChartDif").getContext('2d');

        var myChart = new Chart(statistics_chart, {
        type: 'line',
        data: {
            labels: ["D", "I", "S", "C"],
            datasets: [{
            label: 'Diference',
            data: datadif,
            borderWidth: 4,
            borderColor: '#6777ef',
            backgroundColor: 'transparent',
            pointBackgroundColor: '#fff',
            pointBorderColor: '#6777ef',
            pointRadius: 4
            }]
        },
        options: {
            legend: {
            display: false
            },
            scales: {
            yAxes: [{
                gridLines: {
                display: false,
                drawBorder: false,
                },
                ticks: {
                stepSize: 4
                }
            }],
            xAxes: [{
                gridLines: {
                color: '#fbfbfb',
                lineWidth: 1
                }
            }]
            },
        }
        });

        var xxx = <?php echo $allreportdisc->id ?>;
        $(document).ready(function(){
        $("#print").click(function(){
            document.getElementsByClassName('main-sidebar')[0].style.visibility = 'hidden';
            window.print();
            window.location.replace("/allreportdisc/"+ xxx);
        });
        });

    </script>

@endsection