<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\rumusRequest;
use App\RumusLest;
use Illuminate\Http\Request;

class rumusLestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RumusLest::paginate(10);
        return view('Superadmin.RumusLest.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Superadmin.RumusLest.create');
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
        RumusLest::create($data);
        return redirect()->route('rumuslest.index');
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
    public function edit(RumusLest $rumuslest)
    {
        return view('Superadmin.RumusLest.edit', compact('rumuslest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(rumusRequest $request, RumusLest $rumuslest)
    {
        $data = $request->all();
        $rumuslest->update($data);
        return redirect()->route('rumuslest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RumusLest $rumuslest)
    {
        $rumuslest->delete();
        return redirect()->route('rumuslest.index');
    }
}
