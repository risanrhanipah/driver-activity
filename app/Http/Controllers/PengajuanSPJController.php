<?php

namespace App\Http\Controllers;

use App\Models\Detailspj;
use App\Models\SPJ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanSPJController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan_spj = SPJ::latest()->paginate(5);

        return view('spj.index', compact('pengajuan_spj'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spj.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $validasi = $request->validate([
            'start_date'    => 'required',
            'end_date'      => 'required',
            'project'       => 'required',
            'description'   => 'required',
        ]);

        $validasi['user_id'] = Auth::id();

        $spj = SPJ::create($validasi);

        $tgl1 = strtotime($request->start_date);
        $tgl2 = strtotime($request->end_date);
        $jarak = ($tgl2 - $tgl1) / 60 / 60 / 24;

        $nominal = 0;
        foreach ($request->keperluan as $detail) {
            if ($detail == 'Uang Makan') {
                $nominal = 45000;
            } else if ($detail == 'Uang Saku') {
                $nominal = 25000;
            } else if ($detail == 'Uang Penginapan') {
                $nominal = 50000;
            } else {
                $nominal = $request->nominal;
                $detail = $request->keperluan_other;
            }

            Detailspj::create([
                'spj_id' => $spj->id,
                'keperluan' => $detail,
                'nominal' => $nominal,
                'jumlah' => $jarak,
                'total' => intval($nominal) * intval($jarak)
            ]);
        }

        return redirect()->route('pengajuan.spj')->with('created successfully');
    }

    public function show($id)
    {
        $spj = SPJ::with('detailspj')->find($id);
        return view('spj.edit', compact('spj'));
    }

    public function edit($id)
    {
        $makan = "";
        $penginapan = "";
        $saku = "";
        $other = "";

        $spj = SPJ::with('detailspj')->find($id);
        // dd($spj);

        foreach ($spj->detailspj as $detail) {
            if ($detail->keperluan == "Uang Makan") {
                $makan = $detail->keperluan;
            } else if ($detail->keperluan == "Uang Penginapan") {
                $penginapan = $detail->keperluan;
            } else if ($detail->keperluan == "Uang Saku") {
                $saku = $detail->keperluan;
            } else {
                $other = $detail->keperluan;
            }
        }

        $spj['kep_makan'] = $makan;
        $spj['kep_penginapan'] = $penginapan;
        $spj['kep_saku'] = $saku;
        $spj['kep_other'] = $other;

        // dd($spj);
        return view('spj.edit', compact('spj'));
    }

    public function update(Request $request, $id)
    {
        $spj = SPJ::find($id);
        $detailspj = Detailspj::where('spj_id', $id)->delete();
        // dd($request);
        $validasi = $request->validate([
            'start_date'    => 'required',
            'end_date'      => 'required',
            'project'       => 'required',
            'description'   => 'required',
        ]);

        $validasi['user_id'] = Auth::id();

        $spj->update($validasi);

        $tgl1 = strtotime($request->start_date);
        $tgl2 = strtotime($request->end_date);
        $jarak = ($tgl2 - $tgl1) / 60 / 60 / 24;

        $nominal = 0;
        foreach ($request->keperluan as $detail) {
            if ($detail == 'Uang Makan') {
                $nominal = 45000;
            } else if ($detail == 'Uang Saku') {
                $nominal = 25000;
            } else if ($detail == 'Uang Penginapan') {
                $nominal = 50000;
            } else {
                $nominal = $request->nominal;
                $detail = $request->keperluan_other;
            }

            Detailspj::create([
                'spj_id' => $spj->id,
                'keperluan' => $detail,
                'nominal' => $nominal,
                'jumlah' => $jarak,
                'total' => intval($nominal) * intval($jarak)
            ]);
        }

        return redirect()->route('pengajuan.spj')->with('created successfully');
    }
}
