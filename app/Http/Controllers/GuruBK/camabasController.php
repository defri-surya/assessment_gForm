<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use App\Camaba;
use App\Jurusan;
use App\Kampus;
use App\Presentase;
use App\ShareBK;
use App\User;
use Illuminate\Http\Request;

class camabasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Camaba::where('gurubk_id', auth()->user()->id)->when($request->cari, function ($query) use ($request) {
            return $query->where('nama', 'LIKE', "%" . $request->cari . "%");
        })->paginate(10);
        return view('GuruBK.Camaba.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = User::where('gurubkid', auth()->user()->id)->get();
        $kampus = Kampus::get();
        $jurusan = Jurusan::get();
        return view('GuruBK.Camaba.create', compact('kampus', 'jurusan', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $x = $request->all();
        $data = new Camaba;
        $data->user_id = $x['user_id'];
        $data->gurubk_id = auth()->user()->id;
        $data->afiliator_id = auth()->user()->afiliatorid;
        $data->kampus_id = $x['kampus_id'];
        $data->jurusan_id = $x['jurusan_id'];
        $data->biaya = $x['biaya'];
        // dd($data);
        $data->save();

        $persen = Presentase::first();

        // fee Sistem
        $biaya = $data['biaya'];
        $sistem = $biaya * $persen->sistem / 100;

        // fee guru BK
        $gurubk = $biaya * $persen->gurubk / 100;

        // fee Afiliator
        $afiliator = $biaya * $persen->afiliator / 100;

        $fee = new ShareBK;
        $fee->user_id = $data->user_id;
        $fee->camaba_id = $data->id;
        $fee->gurubk_id = $data->gurubk_id;
        $fee->afiliatorid = $data->afiliator_id;
        $fee->fee_sistem = $sistem;
        $fee->fee_bk = $gurubk;
        $fee->fee_afiliator = $afiliator;
        $fee->save();

        return redirect()->route('camabas.index');
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
        $data = Camaba::where('id', $id)->first();
        $siswa = User::where('gurubkid', auth()->user()->id)->get();
        $kampus = Kampus::get();
        $jurusan = Jurusan::get();
        return view('GuruBK.Camaba.edit', compact('data', 'kampus', 'jurusan', 'siswa'));
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
        $datacamaba = Camaba::where('id', $id)->first();
        $data = $request->all();
        $datacamaba->update([
            'user_id' => $data['user_id'],
            'gurubk_id' => $data['gurubk_id'],
            'afiliatorid' => $data['afiliatorid'],
            'kampus_id' => $data['kampus_id'],
            'jurusan_id' => $data['jurusan_id'],
            'biaya' => $data['biaya'],
        ]);

        $persen = Presentase::first();

        // fee Sistem
        $biaya = $data['biaya'];
        $sistem = $biaya * $persen->sistem / 100;

        // fee guru BK
        $gurubk = $biaya * $persen->gurubk / 100;

        // fee Afiliator
        $afiliator = $biaya * $persen->afiliator / 100;

        $fee = new ShareBK;
        $fee->user_id = $data['user_id'];
        $fee->camaba_id = $datacamaba->id;
        $fee->gurubk_id = $data['gurubk_id'];
        $fee->afiliator_id = $data['afiliator_id'];
        $fee->fee_sistem = $sistem;
        $fee->fee_bk = $gurubk;
        $fee->fee_afiliator = $afiliator;
        $fee->save();

        return redirect()->route('camabas.index');
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
