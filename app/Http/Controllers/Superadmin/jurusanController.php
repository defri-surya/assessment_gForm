<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Jurusan;
use App\Kampus;
use Illuminate\Http\Request;

class jurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Jurusan::with('kampus')->when($request->cari, function ($query) use ($request) {
            return $query->where('nama_jurusan', 'LIKE', "%" . $request->cari . "%");
        })->paginate(10);
        return view('Superadmin.Jurusan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kampus = Kampus::get();
        return view('Superadmin.Jurusan.create', compact('kampus'));
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
            'nama_jurusan' => 'required',
        ]);

        $data = $request->all();
        Jurusan::create($data);
        return redirect()->route('jurusan.index');
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
        $data = Jurusan::where('id', $id)->first();
        // dd($data);
        return view('Superadmin.Jurusan.edit', compact('data', 'kampus'));
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
        $dataJurusan = $request->all();
        // dd($data);
        $data = Jurusan::where('id', $id)->first();
        $data->update($dataJurusan);
        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jurusan::where('id', $id)->first();
        $data->delete();
        return redirect()->route('jurusan.index');
    }
}
