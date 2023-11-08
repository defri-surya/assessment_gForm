<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Jurusan;
use Illuminate\Http\Request;

class configController extends Controller
{
    public function getJurusan($kampusId)
    {
        $jurusan = Jurusan::where('kampus_id', $kampusId)->pluck('nama_jurusan', 'id');

        return response()->json($jurusan);
    }
}
