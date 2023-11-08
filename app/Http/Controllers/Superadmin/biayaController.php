<?php

namespace App\Http\Controllers\Superadmin;

use App\Biaya;
use App\Http\Controllers\Controller;
use App\Jurusan;
use App\Kampus;
use Illuminate\Http\Request;

class biayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Biaya::with('kampus', 'jurusan')->when($request->cari, function ($query) use ($request) {
            return $query->where('nama_jurusan', 'LIKE', "%" . $request->cari . "%");
        })->paginate(10);
        return view('Superadmin.Biaya.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kampus = Kampus::get();
        $jurusan = Jurusan::get();
        return view('Superadmin.Biaya.create', compact('kampus', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kampus_id' => 'required',
            'jurusan_id' => 'required',
            'biaya' => 'required',
        ]);

        $data = $request->all();
        Biaya::create($data);
        return redirect()->route('biaya.index');
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
        $kampus = Kampus::get();
        $jurusan = Jurusan::get();
        $data = Biaya::where('id', $id)->first();
        // dd($data);
        return view('Superadmin.Biaya.edit', compact('data', 'kampus', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataBiaya = $request->all();
        // dd($data);
        $data = Biaya::where('id', $id)->first();
        $data->update($dataBiaya);
        return redirect()->route('biaya.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Biaya::where('id', $id)->first();
        $data->delete();
        return redirect()->route('biaya.index');
    }
}
