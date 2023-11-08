<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\sekolahRequest;
use App\sekolah;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class sekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = sekolah::when($request->cari, function ($query) use ($request){
            return $query->where('namasekolah', 'LIKE', "%".$request->cari."%");
        })->paginate(8);
        return view('Superadmin.Sekolah.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Superadmin.Sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(sekolahRequest $request)
    {
        $data = $request->all();
        sekolah::create($data);
        return redirect()->route('sekolah.index');
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
    public function edit(sekolah $sekolah)
    {
        return view('Superadmin.Sekolah.edit', compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(sekolahRequest $request, sekolah $sekolah)
    {
        $sekolah->update($request->all());
        return redirect()->route('sekolah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(sekolah $sekolah)
    {
        $cek = User::where('sekolahid', $sekolah->id)->first();
        if(isset($cek)){
            Alert::warning('Data Masih Di Gunakan User');
            return redirect()->back();
        }
        $sekolah->delete();
        return redirect()->route('sekolah.index');
    }
}
