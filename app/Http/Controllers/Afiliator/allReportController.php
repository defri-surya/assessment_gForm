<?php

namespace App\Http\Controllers\Afiliator;

use App\hasilakhir;
use App\Http\Controllers\Controller;
use App\kepribadian;
use App\RumusDif;
use App\RumusLest;
use App\RumusMost;
use Illuminate\Http\Request;

class allReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = hasilakhir::where('afiliatorid', auth()->user()->id)->when($request->cari, function ($query) use ($request) {
            return $query->where('nama', 'LIKE', "%" . $request->cari . "%")
                ->orWhere('nisn', 'LIKE', "%" . $request->cari . "%")
                ->orWhere('namasekolah', 'LIKE', "%" . $request->cari . "%");
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
    public function show($id)
    {
        $allreportdisc = hasilakhir::where('id', $id)->first();
        // $datates = [
        //     'D' => '3.14',
        //     'I' => '3.11',
        //     'S' => '-4',
        //     'C' => '-4.5',
        //  ];
        //  asort($datates);  

        // dd($datates);

        // untuk chart
        $m = [
            $allreportdisc['D_MOST'],
            $allreportdisc['I_MOST'],
            $allreportdisc['S_MOST'],
            $allreportdisc['C_MOST'],
        ];
        $most = json_encode($m);

        $l = [
            $allreportdisc['D_LEST'],
            $allreportdisc['I_LEST'],
            $allreportdisc['S_LEST'],
            $allreportdisc['C_LEST'],
        ];
        $lest = json_encode($l);

        // pengurangan m-l
        $d = [
            $div_D_Most = $allreportdisc['D_MOST'] - $allreportdisc['D_LEST'],
            $div_I_Most = $allreportdisc['I_MOST'] - $allreportdisc['I_LEST'],
            $div_S_Most = $allreportdisc['S_MOST'] - $allreportdisc['S_LEST'],
            $div_C_Most = $allreportdisc['C_MOST'] - $allreportdisc['C_LEST'],
        ];

        $dif = json_encode($d);



        // rumus baru

        // rumus Most
        $MD = RumusMost::where('nilai', $allreportdisc['D_MOST'])->first();
        $MI = RumusMost::where('nilai', $allreportdisc['I_MOST'])->first();
        $MS = RumusMost::where('nilai', $allreportdisc['S_MOST'])->first();
        $MC = RumusMost::where('nilai', $allreportdisc['C_MOST'])->first();

        // Rumus Lest
        $LD = RumusLest::where('nilai', $allreportdisc['D_LEST'])->first();
        $LI = RumusLest::where('nilai', $allreportdisc['I_LEST'])->first();
        $LS = RumusLest::where('nilai', $allreportdisc['S_LEST'])->first();
        $LC = RumusLest::where('nilai', $allreportdisc['C_LEST'])->first();

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


        // $datamost = [
        //    'D' => $MD['D'],
        //    'I' => $MI['I'],
        //    'S' => $MS['S'],
        //    'C' => $MC['C'],
        // ];
        // arsort($datamost);

        // $datalest = [
        //     'D' => $LD['D'],
        //     'I' => $LI['I'],
        //     'S' => $LS['S'],
        //     'C' => $LC['C'],
        //  ];
        //  arsort($datalest);

        //  $datadif = [
        //     'D' => $DD['D'],
        //     'I' => $DI['I'],
        //     'S' => $DS['S'],
        //     'C' => $DC['C'],
        //  ];
        //  arsort($datadif);

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

        $most3besar = array_slice($datamost, 0, 3, true);
        $lest3besar = array_slice($datalest, 0, 3, true);
        $dif3besar = array_slice($datadif, 0, 3, true);

        $finalmost = array_diff($most3besar, [0]);
        $finallest = array_diff($lest3besar, [0]);
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
        //  dd($kepmost);

        return view('Afiliator.HasilDisc.show', compact('most', 'lest', 'dif', 'allreportdisc', 'kepmost', 'keplest', 'kepdif'));
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
    public function destroy(hasilakhir $allreportdisc)
    {
        $allreportdisc->delete();
        return redirect()->route('allreportdisc.index');
    }
}
