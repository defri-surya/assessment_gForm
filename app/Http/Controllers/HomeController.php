<?php

namespace App\Http\Controllers;

use App\hasilakhir;
use App\sekolah;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sekolah = sekolah::get();
        $user = User::get();
        $totalsekolah = $sekolah->count();
        $totaluser = $user->count();
        if (auth()->user()->role == 'gurubk') {
            $siswa = User::where([
                ['sekolahid', auth()->user()->sekolahid],
                ['role', 'siswa'],
            ])->get();
            $siswaaktif = User::where([
                ['sekolahid', auth()->user()->sekolahid],
                ['role', 'siswa'],
                ['status', 'aktif'],
            ])->get();
            $hasil = hasilakhir::where('sekolahid', auth()->user()->sekolahid)->get();
            $totalsiswa = $siswa->count();
            $totalhasil = $hasil->count();
            $totalsiswaaktif = $siswaaktif->count();
        }
        if (auth()->user()->role == 'afiliator') {
            $siswa = User::where([
                ['sekolahid', auth()->user()->sekolahid],
                ['role', 'siswa'],
            ])->get();
            $siswaaktif = User::where([
                ['sekolahid', auth()->user()->sekolahid],
                ['role', 'siswa'],
                ['status', 'aktif'],
            ])->get();
            $hasil = hasilakhir::where('sekolahid', auth()->user()->sekolahid)->get();
            $totalsiswa = $siswa->count();
            $totalhasil = $hasil->count();
            $totalsiswaaktif = $siswaaktif->count();
        }
        if (auth()->user()->role == 'superadmin') {
            $siswa = User::where('role', 'siswa')->get();
            $hasil = hasilakhir::get();
            $siswaaktif = User::where([
                ['role', 'siswa'],
                ['status', 'aktif'],
            ])->get();
            $totalsiswa = $siswa->count();
            $totalhasil = $hasil->count();
            $totalsiswaaktif = $siswaaktif->count();
        }

        // dd(auth()->user()->role);
        if (auth()->user()->role == 'siswa') {
            return view('Siswa.home');
        }
        return view('home', compact('totaluser', 'totalsekolah', 'totalsiswa', 'totalhasil', 'totalsiswaaktif'));
    }
}
