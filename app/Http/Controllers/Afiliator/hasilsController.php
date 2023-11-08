<?php

namespace App\Http\Controllers\Afiliator;

use App\hasilakhir;
use App\Http\Controllers\Controller;
use App\kepribadian;
use App\User;
use App\RumusDif;
use App\RumusLest;
use App\RumusMost;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class hasilsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = hasilakhir::where('sekolahid', auth()->user()->sekolahid)->when($request->cari, function ($query) use ($request) {
            return $query->where('nama', 'LIKE', "%" . $request->cari . "%")
                ->orWhere('nisn', 'LIKE', "%" . $request->cari . "%");
        })->paginate(8);
        return view('Afiliator.HasilDisc.index', compact('data'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(hasilakhir $hasilsemua)
    {
        // $datates = [
        //     'D' => '3.14',
        //     'I' => '3.67',
        //     'S' => '4',
        //     'C' => '3',
        //  ];
        //  asort($datates);  

        // dd($datates);

        if ($hasilsemua->sekolahid != auth()->user()->sekolahid) {
            Alert::warning('Peringatan', 'Bukan id Siswa Anda');
            return redirect()->back();
        }
        // untuk chart
        $m = [
            $hasilsemua['D_MOST'],
            $hasilsemua['I_MOST'],
            $hasilsemua['S_MOST'],
            $hasilsemua['C_MOST'],
        ];
        // dd($m);
        $most = json_encode($m);

        $l = [
            $hasilsemua['D_LEST'],
            $hasilsemua['I_LEST'],
            $hasilsemua['S_LEST'],
            $hasilsemua['C_LEST'],
        ];
        $lest = json_encode($l);

        // pengurangan m-l
        $d = [
            $div_D_Most = $hasilsemua['D_MOST'] - $hasilsemua['D_LEST'],
            $div_I_Most = $hasilsemua['I_MOST'] - $hasilsemua['I_LEST'],
            $div_S_Most = $hasilsemua['S_MOST'] - $hasilsemua['S_LEST'],
            $div_C_Most = $hasilsemua['C_MOST'] - $hasilsemua['C_LEST'],
        ];

        $dif = json_encode($d);


        // rumus Most
        $MD = RumusMost::where('nilai', $hasilsemua['D_MOST'])->first();
        $MI = RumusMost::where('nilai', $hasilsemua['I_MOST'])->first();
        $MS = RumusMost::where('nilai', $hasilsemua['S_MOST'])->first();
        $MC = RumusMost::where('nilai', $hasilsemua['C_MOST'])->first();

        // Rumus Lest
        $LD = RumusLest::where('nilai', $hasilsemua['D_LEST'])->first();
        $LI = RumusLest::where('nilai', $hasilsemua['I_LEST'])->first();
        $LS = RumusLest::where('nilai', $hasilsemua['S_LEST'])->first();
        $LC = RumusLest::where('nilai', $hasilsemua['C_LEST'])->first();

        // Rumas Dif
        $DD = RumusDif::where('nilai', $div_D_Most)->first();
        $DI = RumusDif::where('nilai', $div_I_Most)->first();
        $DS = RumusDif::where('nilai', $div_S_Most)->first();
        $DC = RumusDif::where('nilai', $div_C_Most)->first();


        $D_MOST = 0;
        $I_MOST = 0;
        $S_MOST = 0;
        $C_MOST = 0;
        $D_LEST = 0;
        $I_LEST = 0;
        $S_LEST = 0;
        $C_LEST = 0;
        $D_DIF = 0;
        $I_DIF = 0;
        $S_DIF = 0;
        $C_DIF = 0;

        // most
        if ($MD['D'] > 0) {
            $D_MOST = $MD['D'];
        }
        if ($MI['I'] > 0) {
            $I_MOST = $MI['I'];
        }
        if ($MS['S'] > 0) {
            $S_MOST = $MS['S'];
        }
        if ($MC['C'] > 0) {
            $C_MOST = $MC['C'];
        }
        // lest
        if ($LD['D'] > 0) {
            $D_LEST = $LD['D'];
        }
        if ($LI['I'] > 0) {
            $I_LEST = $LI['I'];
        }
        if ($LS['S'] > 0) {
            $S_LEST = $LS['S'];
        }
        if ($LC['C'] > 0) {
            $C_LEST = $LC['C'];
        }

        // dif
        if ($DD['D'] > 0) {
            $D_DIF = $DD['D'];
        }
        if ($DI['I'] > 0) {
            $I_DIF = $DI['I'];
        }
        if ($DS['S'] > 0) {
            $S_DIF = $DS['S'];
        }
        if ($DC['C'] > 0) {
            $C_DIF = $DC['C'];
        }


        //   $datamost = [
        //      'D' => $MD['D'],
        //      'I' => $MI['I'],
        //      'S' => $MS['S'],
        //      'C' => $MC['C'],
        //   ];
        //   arsort($datamost);

        //   $datalest = [
        //       'D' => $LD['D'],
        //       'I' => $LI['I'],
        //       'S' => $LS['S'],
        //       'C' => $LC['C'],
        //    ];
        //    arsort($datalest);

        //    $datadif = [
        //       'D' => $DD['D'],
        //       'I' => $DI['I'],
        //       'S' => $DS['S'],
        //       'C' => $DC['C'],
        //    ];
        //    arsort($datadif);

        $datamost = [
            'D' => $D_MOST,
            'I' => $I_MOST,
            'S' => $S_MOST,
            'C' => $C_MOST,
        ];
        arsort($datamost);

        $datalest = [
            'D' => $D_LEST,
            'I' => $I_LEST,
            'S' => $S_LEST,
            'C' => $C_LEST,
        ];
        arsort($datalest);

        $datadif = [
            'D' => $D_DIF,
            'I' => $I_DIF,
            'S' => $S_DIF,
            'C' => $C_DIF,
        ];
        arsort($datadif);

        // dd($datadif);

        $most3besar = array_slice($datamost, 0, 3, true);
        $lest3terbesar = array_slice($datalest, 0, 3, true);
        $dif3besar = array_slice($datadif, 0, 3, true);

        $finalmost = array_diff($most3besar, [0]);
        $finallest = array_diff($lest3terbesar, [0]);
        $finaldif = array_diff($dif3besar, [0]);

        $flipmost = array_flip($finalmost);
        $mostfix = implode(",", $flipmost);

        $fliplest = array_flip($finallest);
        $lestfix = implode(",", $fliplest);

        $flipdif = array_flip($finaldif);
        $diffix = implode(",", $flipdif);


        $kepmost = kepribadian::where('typekepribadian', $mostfix)->first();
        $keplest = kepribadian::where('typekepribadian', $lestfix)->first();
        $kepdif = kepribadian::where('typekepribadian', $diffix)->first();

        //  dd($finalmost);

        return view('Afiliator.HasilDisc.show', compact('most', 'lest', 'dif', 'hasilsemua', 'kepmost', 'keplest', 'kepdif'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(hasilakhir $hasilsemua)
    {
        $hasilsemua->delete();
        return redirect()->route('hasilsemua.index');
    }
}
