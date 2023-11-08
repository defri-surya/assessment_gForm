<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuruBK\profilUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class profilController extends Controller
{
    public function index()
    {
        return view('GuruBK.Profil.index');
    }

    public function edit($id)
    {
        if(auth()->user()->id != $id){
            Alert::warning('Peringatan', 'Bukan Akun Anda');
            return view('GuruBK.Profil.index');
        }
        $user = User::find($id);
        return view('GuruBK.Profil.edit', compact('user'));
    }

    public function update(profilUpdateRequest $request,$id)
    {
        $user = User::find($id);
        if (empty($request->password)) :
            $request->request->add(['password' => $user->password]);
            // dd($request->all());
            $data = $request->all();
            $user->update($data);
            Alert::info('Berhasil', 'Data Berhasil Di Update');
            return redirect()->route('profil.index');
        endif;
        $request->request->add(['password' => bcrypt($request->password)]);
        // dd($request->all());
        $data = $request->all();
        $user->update($data);
        Alert::info('Berhasil', 'Data Berhasil Di Update');
        return redirect()->route('profil.index');
    }
}
