<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\afiliatorRequest;
use App\Http\Requests\afiliatorRequestUpdate;
use App\sekolah;
use App\User;
use Illuminate\Http\Request;

class afiliatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::with('sekolah')->where('role', 'afiliator')->when($request->cari, function ($query) use ($request) {
            return $query->where('nama', 'LIKE', "%" . $request->cari . "%");
        })->paginate(8);
        return view('Superadmin.Afiliator.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $sekolah = sekolah::get();
        return view('Superadmin.Afiliator.create'/* , compact('sekolah') */);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(afiliatorRequest $request)
    {
        if (empty($request->status)) :
            $request->request->add(['status' => 'aktif']);
            $request->request->add(['password' => bcrypt('afiliator')]);
        endif;
        $data = $request->all();
        User::create($data);
        return redirect()->route('afiliator.index');
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
        $user = User::where('id', $id)->first();
        // $sekolah = sekolah::get();
        return view('Superadmin.Afiliator.edit', compact('user'/* , 'sekolah' */));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(afiliatorRequestUpdate $request, $id)
    {
        $user = User::where('id', $id)->first();
        $data = $request->all();
        // dd($data);
        $user->update($data);
        return redirect()->route('afiliator.index');
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
        return redirect()->route('afiliator.index');
    }
}
