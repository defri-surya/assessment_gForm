<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\rumusRequest;
use App\RumusMost;
use Illuminate\Http\Request;

class rumusMostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RumusMost::paginate(10);
        return view('Superadmin.RumusMost.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Superadmin.RumusMost.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rumusRequest $request)
    {
        $data = $request->all();
        RumusMost::create($data);
        return redirect()->route('rumusmost.index');
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
    public function edit(RumusMost $rumusmost)
    {
        return view('Superadmin.RumusMost.edit', compact('rumusmost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(rumusRequest $request, RumusMost $rumusmost)
    {
        $data = $request->all();
        $rumusmost->update($data);
        return redirect()->route('rumusmost.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RumusMost $rumusmost)
    {
        $rumusmost->delete();
        return redirect()->route('rumusmost.index');
    }
}
