<?php

namespace App\Http\Controllers\Afiliator;

use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Http\Requests\userRequestUpdate;
use App\sekolah;
use App\User;
use Illuminate\Http\Request;

class gurubkafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::with('sekolah')->where('role', 'gurubk')->where('afiliatorid', auth()->user()->id)->when($request->cari, function ($query) use ($request) {
            return $query->where('nama', 'LIKE', "%" . $request->cari . "%");
        })->paginate(8);
        return view('Afiliator.GuruBk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = sekolah::get();
        return view('Afiliator.GuruBk.create', compact('sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userRequest $request)
    {
        if (empty($request->status)) :
            $request->request->add(['status' => 'aktif']);
            $request->request->add(['password' => bcrypt('gurubk')]);
        endif;
        $data = $request->all();
        if ($data['sekolahid'] == 'lainnya') {
            $sekolah = new sekolah;
            $sekolah->namasekolah = $data['sekolahlainnya'];
            $sekolah->alamat = $data['alamat'];
            $sekolah->save();

            $gurubk = new User;
            $gurubk->afiliatorid = $data['afiliatorid'];
            $gurubk->nama = $data['nama'];
            $gurubk->username = $data['username'];
            $gurubk->sekolahid = $sekolah->id;
            $gurubk->jeniskelamin = $data['jeniskelamin'];
            $gurubk->role = $data['role'];
            $gurubk->tanggallahir = $data['tanggallahir'];
            $gurubk->status = $data['status'];
            $gurubk->password = $data['password'];
            $gurubk->nisn = $data['nisn'];
            $gurubk->nip = $data['nip'];
            $gurubk->save();
        } else {
            User::create($data);
        }
        return redirect()->route('gurubkaf.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $sekolah = sekolah::get();
        return view('Afiliator.GuruBk.edit', compact('user', 'sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userRequestUpdate $request, $id)
    {
        $user = User::where('id', $id)->first();
        $data = $request->all();
        if ($data['sekolahid'] == 'lainnya') {
            $sekolah = new sekolah;
            $sekolah->namasekolah = $data['sekolahlainnya'];
            $sekolah->alamat = $data['alamat'];
            $sekolah->save();

            $user->update([
                'afiliatorid' => $data['afiliatorid'],
                'nama' => $data['nama'],
                'sekolahid' => $sekolah->id,
                'jeniskelamin' => $data['jeniskelamin'],
                'role' => $data['role'],
                'tanggallahir' => $data['tanggallahir'],
                'nisn' => $data['nisn'],
                'nip' => $data['nip'],
            ]);
        } else {
            $user->update($data);
        }
        return redirect()->route('gurubkaf.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route('gurubkaf.index');
    }
}
