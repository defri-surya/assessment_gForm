<?php

namespace App\Http\Controllers\Afiliator;

use App\Http\Controllers\Controller;
use App\Camaba;
use App\Jurusan;
use App\Kampus;
use App\Presentase;
use App\ShareBK;
use Illuminate\Http\Request;

class camabassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Camaba::where('afiliator_id', auth()->user()->id)->when($request->cari, function ($query) use ($request) {
            return $query->where('nama', 'LIKE', "%" . $request->cari . "%");
        })->paginate(10);
        return view('Afiliator.Camaba.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function firstedit($id)
    {
        $data = Camaba::where('id', $id)->first();
        $kampus = Kampus::get();
        $jurusan = Jurusan::get();
        return view('Afiliator.Camaba.create', compact('data', 'kampus', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeedit(Request $request, $id)
    {
        $datacamaba = Camaba::where('id', $id)->first();
        $data = $request->all();
        $datacamaba->update([
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
        $fee->user_id = $datacamaba->user_id;
        $fee->camaba_id = $datacamaba->id;
        $fee->gurubk_id = auth()->user()->id;
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
        $kampus = Kampus::get();
        $jurusan = Jurusan::get();
        return view('Afiliator.Camaba.edit', compact('data', 'kampus', 'jurusan'));
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
        $fee->user_id = $datacamaba->user_id;
        $fee->camaba_id = $datacamaba->id;
        $fee->gurubk_id = auth()->user()->id;
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
