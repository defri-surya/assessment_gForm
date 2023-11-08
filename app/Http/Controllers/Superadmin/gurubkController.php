<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Http\Requests\userRequestUpdate;
use App\sekolah;
use App\User;
use Illuminate\Http\Request;

class gurubkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::with('sekolah')->where('role', 'gurubk')->when($request->cari, function ($query) use ($request) {
            return $query->where('nama', 'LIKE', "%" . $request->cari . "%");
        })->paginate(8);
        return view('Superadmin.GuruBK.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = sekolah::get();
        return view('Superadmin.GuruBK.create', compact('sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userRequest $request)
    {
        if (empty($request->status)) :
            $request->request->add(['status' => 'aktif']);
            $request->request->add(['password' => bcrypt('gurubk')]);
        endif;
        $data = $request->all();
        User::create($data);
        return redirect()->route('gurubk.index');
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
    public function edit(User $user)
    {
        $sekolah = sekolah::get();
        return view('Superadmin.GuruBK.edit', compact('user', 'sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userRequestUpdate $request, User $user)
    {
        $data = $request->all();
        $user->update($data);
        return redirect()->route('gurubk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('gurubk.index');
    }
}
