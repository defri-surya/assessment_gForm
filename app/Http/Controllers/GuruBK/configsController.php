<?php

namespace App\Http\Controllers\GuruBK;

use App\Biaya;
use App\Http\Controllers\Controller;
use App\Jurusan;
use Illuminate\Http\Request;

class configsController extends Controller
{
    public function getJurusanBK($kampusId)
    {
        $jurusan = Jurusan::where('kampus_id', $kampusId)->pluck('nama_jurusan', 'id');

        return response()->json($jurusan);
    }

    public function getBiaya($jurusanId)
    {
        $biaya = Biaya::where('jurusan_id', $jurusanId)->value('biaya');

        return response()->json($biaya);
    }
}
