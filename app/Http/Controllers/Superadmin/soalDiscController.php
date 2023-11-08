<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\discRequestCreate;
use App\soaldisc;
use Illuminate\Http\Request;

class soalDiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = soaldisc::when($request->cari, function ($query) use ($request){
            return $query->where('pilihan_a', 'LIKE', "%".$request->cari."%")
                         ->orWhere('pilihan_b', 'LIKE', "%".$request->cari."%")
                         ->orWhere('pilihan_c', 'LIKE', "%".$request->cari."%")
                         ->orWhere('pilihan_d', 'LIKE', "%".$request->cari."%");
        })->paginate(8);
        return view('Superadmin.SoalDisc.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Superadmin.SoalDisc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(discRequestCreate $request)
    {
        $data = $request->all();
        soaldisc::create($data);
        return redirect()->route('soaldisc.index');
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
    public function edit(soaldisc $soaldisc)
    {
        return view('Superadmin.SoalDisc.edit', compact('soaldisc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(discRequestCreate $request, soaldisc $soaldisc)
    {
        $data = $request->all();
        $soaldisc->update($data);
        return redirect()->route('soaldisc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(soaldisc $soaldisc)
    {
        return redirect()->route('soaldisc.index');
    }
}
