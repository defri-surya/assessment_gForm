<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class profilSiswaController extends Controller
{
    public function index()
    {
        return view('Siswa.Profil.index');
    }

    public function edit($id)
    {
        if(auth()->user()->id != $id){
            Alert::warning('Peringatan', 'Bukan Akun Anda');
            return view('Siswa.Profil.index');
        }
        $user = User::find($id);
        return view('Siswa.Profil.edit', compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        if (empty($request->password)) :
            $request->request->add(['password' => $user->password]);
            $request->request->add(['username' => $user->username]);
            $request->request->add(['role' => $user->role]);
            $request->request->add(['status' => $user->status]);
            $request->request->add(['sekolahid' => $user->sekolahid]);
            // dd($request->all());
            $data = $request->all();
            $user->update($data);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('profilsiswa.index');
        endif;
    }
    
}
