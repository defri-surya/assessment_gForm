<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Registrasi</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('bootstrap') }}/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('node_modules') }}/bootstrap-social/bootstrap-social.css"> --}}

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/components.css">
</head>

<body>
    @include('sweetalert::alert')
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <div class="row partner justify-content-center">
                                {{-- <div class="col-md-4 col-6 col-lg-4">
                                    <img width="100" src="{{ asset('front') }}/images/indi.png" alt="">
                                </div> --}}
                                {{-- <div class="col-md-4 col-6 col-lg-4">
                                    <img width="100" src="{{ asset('front') }}/images/abkin.png" alt="">
                                </div> --}}
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Registrasi</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('regis.store') }}" class="needs-validation"
                                    novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap<b style="color: red">*</b></label>
                                        <input id="nama" type="nama"
                                            class="form-control @error('nama') is-invalid @enderror" name="nama"
                                            tabindex="1" value="{{ old('nama') }}" required autofocus>
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Jenis Kelamin<b
                                                    style="color: red">*</b></label>
                                        </div>
                                        <select name="jeniskelamin" id="" class="form-control" required>
                                            <option value="" selected>Pilih Jenis Kelamin</option>
                                            <option {{ old('jeniskelamin') == 'Laki-Laki' ? 'selected' : '' }}
                                                value="Laki-Laki">Laki-Laki</option>
                                            <option {{ old('jeniskelamin') == 'Perempuan' ? 'selected' : '' }}
                                                value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('jeniskelamin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Tanggal Lahir<b
                                                    style="color: red">*</b></label>
                                        </div>
                                        <input type="date" name="tanggallahir" class="form-control"
                                            placeholder="Tanggal Lahir" value="{{ old('tanggallahir') }}" required>
                                        @error('tanggallahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">NISN<b
                                                    style="color: red">*</b></label>
                                        </div>
                                        <input type="text" name="nisn" class="form-control"
                                            placeholder="NISN Siswa" value="{{ old('nisn') }}" required>
                                        @error('nisn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Submit
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        {{-- <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('jquery') }}/jquery.js"></script>
    <script src="{{ asset('jquery') }}/pooper.js"></script>
    <script src="{{ asset('jquery') }}/bootstrap.min.js"></script>
    <script src="{{ asset('jquery') }}/jquery.nicescol.min.js"></script>
    <script src="{{ asset('jquery') }}/moment.min.js"></script>
    <script src="{{ asset('assets') }}/js/stisla.js"></script>
    <script src="{{ asset('assets') }}/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('assets') }}/js/scripts.js"></script>
    <script src="{{ asset('assets') }}/js/custom.js"></script>

</html>
