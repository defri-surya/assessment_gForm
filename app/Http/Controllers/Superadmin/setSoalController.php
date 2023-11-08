<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\setSoalRequestCreate;
use App\kategori;
use App\sekolah;
use App\setsoal;
use Illuminate\Http\Request;

class setSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sekolah = sekolah::get();
        $data = setsoal::with(['sekolah', 'kategori'])->when($request->sekolahid, function ($query) use ($request){
            return $query->where('sekolahid', 'LIKE', "%".$request->sekolahid."%");
        })->paginate(8);
        // dd($data);
        return view('Superadmin.SetSoal.index', compact('data', 'sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::get();
        $sekolah = sekolah::get();
        return view('Superadmin.SetSoal.create', compact('sekolah', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(setSoalRequestCreate $request)
    {
        $data = $request->all();
        setsoal::create($data);
        return redirect()->route('setsoal.index');
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
    public function edit(setsoal $setsoal)
    {
        $kategori = kategori::get();
        $sekolah = sekolah::get();
        return view('Superadmin.SetSoal.edit', compact('sekolah', 'setsoal', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(setSoalRequestCreate $request, setsoal $setsoal)
    {
        $data = $request->all();
        $setsoal->update($data);
        return redirect()->route('setsoal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
