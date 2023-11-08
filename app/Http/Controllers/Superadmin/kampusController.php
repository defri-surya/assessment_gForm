<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Kampus;
use Illuminate\Http\Request;

class kampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Kampus::when($request->cari, function ($query) use ($request) {
            return $query->where('nama_kampus', 'LIKE', "%" . $request->cari . "%");
        })->paginate(10);
        return view('Superadmin.Kampus.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Superadmin.Kampus.create');
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
            'nama_kampus' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);

        $data = $request->all();
        Kampus::create($data);
        return redirect()->route('kampus.index');
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
        $data = Kampus::where('id', $id)->first();
        // dd($data);
        return view('Superadmin.Kampus.edit', compact('data'));
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
        $dataKampus = $request->all();
        // dd($data);
        $data = Kampus::where('id', $id)->first();
        $data->update($dataKampus);
        return redirect()->route('kampus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kampus::where('id', $id)->first();
        $data->delete();
        return redirect()->route('kampus.index');
    }
}
