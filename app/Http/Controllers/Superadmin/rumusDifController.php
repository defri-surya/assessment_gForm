<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\rumusRequest;
use App\RumusDif;
use Illuminate\Http\Request;

class rumusDifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RumusDif::paginate(10);
        return view('Superadmin.RumusDif.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Superadmin.RumusDif.create');
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
        RumusDif::create($data);
        return redirect()->route('rumusdif.index');
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
    public function edit(RumusDif $rumusdif)
    {
        return view('Superadmin.RumusDif.edit', compact('rumusdif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(rumusRequest $request, RumusDif $rumusdif)
    {
        $data = $request->all();
        $rumusdif->update($data);
        return redirect()->route('rumusdif.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RumusDif $rumusdif)
    {
        $rumusdif->delete();
        return redirect()->route('rumusdif.index');
    }
}
