<?php

namespace App\Http\Controllers\Afiliator;

use App\Camaba;
use App\Http\Controllers\Controller;
use App\Http\Requests\GuruBK\siswaCreateRequest;
use App\sekolah;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class siswasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::with('sekolah')->where('role', 'siswa')->where('afiliatorid', auth()->user()->id)->when($request->cari, function ($query) use ($request) {
            return $query->where('nama', 'LIKE', "%" . $request->cari . "%");
        })->paginate(8);
        return view('Afiliator.Siswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $afiliator = User::where('role', 'afiliator')->get();
        return view('Afiliator.Siswa.create', compact('afiliator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(siswaCreateRequest $request)
    {
        // cek nisn
        $cek = User::where('username', $request->nisn)->first();
        if (isset($cek)) {
            Alert::warning('Data NISN' . $request->nisn, 'Telah digunakan hubungi admin');
            return redirect()->route('siswa.create');
        }
        $request->request->add(['username' => $request->nisn]);
        $request->request->add(['password' => bcrypt($request->nisn)]);
        $request->request->add(['role' => 'siswa']);
        $request->request->add(['sekolahid' => auth()->user()->sekolahid]);
        $data = $request->all();
        $user = new User;
        $user->nama = $data['nama'];
        $user->jeniskelamin = $data['jeniskelamin'];
        $user->tanggallahir = $data['tanggallahir'];
        $user->nisn = $request->nisn;
        $user->username = $request->nisn;
        $user->password = bcrypt($request->nisn);
        $user->role = 'siswa';
        $user->sekolahid = auth()->user()->sekolahid;
        $user->status = 'aktif';
        $user->save();

        $camaba = new Camaba;
        $camaba->user_id = $user->id;
        $camaba->gurubk_id = auth()->user()->id;
        $camaba->afiliator_id = $request->afiliator;
        $camaba->nama = $user->nama;
        $camaba->save();

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
        return redirect()->route('siswa.index');
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
    public function edit(User $siswa)
    {
        return view('Afiliator.Siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(siswaCreateRequest $request, User $siswa)
    {
        $cek = User::where('username', $request->nisn)->first();

        if ($siswa->nisn == $request->nisn) {
            $request->request->add(['username' => $request->nisn]);
            $request->request->add(['password' => bcrypt($request->nisn)]);
            // $request->request->add(['status' => 'aktif']);
            $request->request->add(['role' => 'siswa']);
            $request->request->add(['sekolahid' => auth()->user()->sekolahid]);
            $data = $request->all();
            $siswa->update($data);
            Alert::success('Berhasil', 'Data Berhasil Di Ubah');
            return redirect()->route('siswa.index');
        }

        if ($siswa->nisn != $request->nisn) {
            if (isset($cek)) {
                Alert::warning('Data NISN' . $request->nisn, 'Telah digunakan hubungi admin');
                return redirect()->route('siswa.edit', $siswa);
            }
            $request->request->add(['username' => $request->nisn]);
            $request->request->add(['password' => bcrypt($request->nisn)]);
            // $request->request->add(['status' => 'aktif']);
            $request->request->add(['role' => 'siswa']);
            $request->request->add(['sekolahid' => auth()->user()->sekolahid]);
            $data = $request->all();
            $siswa->update($data);
            Alert::success('Berhasil', 'Data Berhasil Di Ubah');
            return redirect()->route('siswa.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $siswa)
    {
        $siswa->delete();
        Alert::warning('Data Siswa' . $siswa->nama, 'Berhasil Dihapus');
        return redirect()->route('siswa.index');
    }
}
