<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\dbKepribadianrequest;
use App\kepribadian;
use Illuminate\Http\Request;

class dbKepribadianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kepribadian::paginate(8);
        return view('Superadmin.DbKepribadian.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Superadmin.DbKepribadian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(dbKepribadianrequest $request)
    {
        $data = $request->all();
        kepribadian::create($data);
        return redirect()->route('kepribadian.index');
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
    public function edit(kepribadian $kepribadian)
    {
        return view('Superadmin.DbKepribadian.edit', compact('kepribadian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(dbKepribadianrequest $request, kepribadian $kepribadian)
    {
        $data = $request->all();
        $kepribadian->update($data);
        return redirect()->route('kepribadian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(kepribadian $kepribadian)
    {
        $kepribadian->delete();
        return redirect()->route('kepribadian.index');
    }
}
