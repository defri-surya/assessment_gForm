<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function index()
    {
        $data = kategori::paginate(10);
        return view('Superadmin.Kategori.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namakategori' => 'required',
        ]);

        $data = $request->all();
        kategori::create($data);
        return redirect()->route('kategori.index');
    }
}
