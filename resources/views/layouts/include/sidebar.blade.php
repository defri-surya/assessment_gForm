<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Tes BK</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BK</a>
        </div>

        <ul class="sidebar-menu">
            @can('isSuperadmin')
                <li class="menu-header">Main Menu</li>
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
                <li
                    class="nav-item dropdown {{ Request::is('afiliator*') ? 'active' : '' }}{{ Request::is('gurubk*') ? 'active' : '' }}{{ Request::is('user*') ? 'active' : '' }}{{ Request::is('camaba*') ? 'active' : '' }}{{ Request::is('sekolah*') ? 'active' : '' }}{{ Request::is('kampus*') ? 'active' : '' }}{{ Request::is('jurusan*') ? 'active' : '' }}{{ Request::is('biaya*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-clipboard"></i><span>Data</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('afiliator*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('afiliator.index') }}"><i class="fas fa-user"></i> <span>Data
                                    Afiliator</span></a>
                        </li>
                        <li class="{{ Request::is('gurubk*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('gurubk.index') }}"><i class="fas fa-user"></i> <span>Data Guru
                                    BK</span></a>
                        </li>
                        <li class="{{ Request::is('user*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('user.index') }}"><i class="fas fa-user"></i> <span>Data Siswa</span></a>
                        </li>
                        <li class="{{ Request::is('camaba*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('camaba.index') }}"><i class="fas fa-user"></i> <span>Data Camaba</span></a>
                        </li>
                        {{-- <li class="nav-item {{ Request::is('user*') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('user.index') }}"><i class="fas fa-user"></i> <span>Data User</span></a></li> --}}
                        <li class="{{ Request::is('sekolah*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('sekolah.index') }}"><i class="fas fa-home"></i> <span>Data
                                    Sekolah</span></a>
                        </li>
                        <li class="{{ Request::is('kampus*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('kampus.index') }}"><i class="fas fa-home"></i> <span>Data Kampus</span></a>
                        </li>
                        <li class="{{ Request::is('jurusan*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('jurusan.index') }}"><i class="fas fa-home"></i> <span>Data
                                    Jurusan</span></a>
                        </li>
                        <li class="{{ Request::is('biaya*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('biaya.index') }}"><i class="fas fa-home"></i> <span>Data Biaya</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('kategori*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('kategori.index') }}"><i class="fas fa-clone"></i> <span>Kategori Soal</span></a>
                </li>

                <li class="nav-item dropdown {{ Request::is('soal*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-clipboard"></i><span>Data Soal
                            Tes</span></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a class="nav-link" href="{{ route('soaldisc.index') }}">DISC</a></li>
                    </ul>
                </li>

                <li class="nav-item {{ Request::is('setsoal*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('setsoal.index') }}"><i class="fas fa-cog"></i><span>Setting Tes</span></a></li>

                <li class="nav-item {{ Request::is('kepribadian*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('kepribadian.index') }}"><i class="fas fa-database"></i></i><span>DB
                            Kepribadian</span></a></li>

                <li
                    class="nav-item dropdown {{ Request::is('rumusmost*') ? 'active' : '' }}{{ Request::is('rumuslest*') ? 'active' : '' }}{{ Request::is('rumusdif*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-archive"></i><span>DB Rumus</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('rumusmost*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('rumusmost.index') }}">Rumus Most</a></li>
                        <li class="{{ Request::is('rumuslest*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('rumuslest.index') }}">Rumus Lest</a></li>
                        <li class="{{ Request::is('rumusdif*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('rumusdif.index') }}">Rumus Dif</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown {{ Request::is('allreportdisc*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-flag-checkered"></i><span>Report
                            Tes</span></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a class="nav-link" href="{{ route('allreportdisc.index') }}">DISC</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown {{ Request::is('presentase*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Setting
                            Fee</span></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a class="nav-link" href="{{ route('presentase.index') }}">Presentase</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Request::is('reportfee*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('reportfee.index') }}"><i class="fas fa-cog"></i><span>Report Fee</span></a></li>
            @endcan

            @can('isGuruBK')
                <li class="menu-header">Main Menu</li>
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

                <li class="nav-item {{ Request::is('profil*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('profil.index') }}"><i class="fas fa-user"></i> <span>Profil</span></a></li>

                <li class="nav-item {{ Request::is('siswa*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('siswa.index') }}"><i class="fas fa-users"></i> <span>Data Siswa</span></a></li>

                <li class="nav-item {{ Request::is('camabas*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('camabas.index') }}"><i class="fas fa-users"></i> <span>Data Camaba</span></a>
                </li>

                <li class="nav-item dropdown {{ Request::is('hasilsemua*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="fas fa-flag-checkered"></i><span>Report</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('hasilsemua*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('hasilsemua.index') }}">DISC</a></li>
                    </ul>
                </li>
            @endcan

            @can('isAfiliator')
                <li class="menu-header">Main Menu</li>
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

                <li class="nav-item {{ Request::is('profils*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('profils.index') }}"><i class="fas fa-user"></i> <span>Profil</span></a></li>

                <li class="nav-item {{ Request::is('siswas*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('siswas.index') }}"><i class="fas fa-users"></i> <span>Data Siswa</span></a></li>

                <li class="{{ Request::is('gurubkaf*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('gurubkaf.index') }}"><i class="fas fa-user"></i> <span>Data Guru
                            BK</span></a>

                <li class="nav-item {{ Request::is('camabass*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('camabass.index') }}"><i class="fas fa-users"></i> <span>Data Camaba</span></a>
                </li>

                <li class="nav-item dropdown {{ Request::is('hasilsemuas*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-flag-checkered"></i><span>Report
                            Tes</span></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a class="nav-link" href="{{ route('hasilsemuas.index') }}">DISC</a></li>
                    </ul>
                </li>
            @endcan

            @can('isSiswa')
                <li class="menu-header">Main Menu</li>
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
                <li class="nav-item {{ Request::is('profilsiswa*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('profilsiswa.index') }}"><i class="fas fa-user"></i> <span>Profil</span></a></li>
                <li class="nav-item {{ Request::is('ujian*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('ujian.index') }}"><i class="fas fa-file-alt"></i> <span>Exam</span></a></li>

                <li class="nav-item {{ Request::is('hasil*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('hasil.disc') }}"><i class="fas fa-flag-checkered"></i> <span>Hasil
                            Ujian</span></a></li>

                {{-- <li class="nav-item dropdown {{ Request::is('hasil*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-flag-checkered"></i><span>Report Tes</span></a>
                <ul class="dropdown-menu">
                  <li class="active"><a class="nav-link" href="{{ route('hasil.disc') }}">DISC</a></li>
                </ul>
              </li> --}}
            @endcan

        </ul>

        <div class="mt-4 p-3 hide-sidebar-mini">
            <a class="btn btn-primary btn-lg btn-block btn-icon-split" href="{{ route('logout') }}"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt text-danger"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        {{-- <div class="mb-4 p-3 hide-sidebar-mini">
          <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
          </a>
        </div> --}}
    </aside>
</div>
