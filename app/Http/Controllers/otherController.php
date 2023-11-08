<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GuruBK\siswaCreateRequest;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class otherController extends Controller
{
    public function regisStore(siswaCreateRequest $request)
    {
        // cek nisn
        $cek = User::where('username', $request->nisn)->first();
        if (isset($cek)) {
            Alert::warning('Data NISN' . $request->nisn, 'Telah digunakan hubungi admin');
            return redirect()->back();
        }
        $request->request->add(['username' => $request->nisn]);
        $request->request->add(['password' => bcrypt($request->nisn)]);
        $request->request->add(['role' => 'siswa']);
        $request->request->add(['sekolahid' => 1]);
        $request->request->add(['afiliatorid' => 2]);
        $request->request->add(['gurubkid' => 3]);
        $data = $request->all();
        $user = new User;
        $user->nama = $data['nama'];
        $user->jeniskelamin = $data['jeniskelamin'];
        $user->tanggallahir = $data['tanggallahir'];
        $user->nisn = $request->nisn;
        $user->username = $request->nisn;
        $user->password = bcrypt($request->nisn);
        $user->role = 'siswa';
        $user->sekolahid = 1;
        $user->afiliatorid = 2;
        $user->gurubkid = 3;
        $user->status = 'aktif';
        $user->save();

        Alert::success('Berhasil', 'Berhasil Registrasi');
        return redirect()->route('login');
    }
}
