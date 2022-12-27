<?php

namespace App\Http\Controllers;

use App\Models\SPJ;
use App\Models\User;
use App\Models\Detailspj;
use Illuminate\Http\Request;
use PDF;

use Illuminate\Support\Facades\DB;
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
        // $attendances = Attendance::latest()->paginate(5);
        // $attendances = User::select("users.id", "users.name", "users.role", DB::raw('COUNT(attendance.user_id) as totalAbsen'))
        //     ->leftJoin("attendance", "attendance.user_id", "=", "users.id")
        //     ->latest("attendance.created_at")->paginate(5);

        $pengajuan_spj = User::with(["spj", 'employee'])->where('role', 'driver')->paginate(5);
        // dd($pengajuan_spj);

        // if ($attendances->employee == null) {
        //     return redirect()->route('employee.create');
        // }

        return view('spj.index', compact('pengajuan_spj'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function history_spj()
    {
        // $attendances = Attendance::latest()->paginate(5);
        // $attendances = User::select("users.id", "users.name", "users.role", DB::raw('COUNT(attendance.user_id) as totalAbsen'))
        //     ->leftJoin("attendance", "attendance.user_id", "=", "users.id")
        //     ->latest("attendance.created_at")->paginate(5);

        $pengajuan_spj = SPJ::with(["user", 'user.employee'])->where('user_id', auth()->user()->id)->paginate(5);
        // dd($pengajuan_spj);

        // if ($attendances->employee == null) {
        //     return redirect()->route('employee.create');
        // }

        return view('spj.history', compact('pengajuan_spj'))
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

        return redirect()->route('pengajuan.history_spj')->with('created successfully');
    }

    public function show($pengajuan_spj)
    {
        $pengajuan_spj = SPJ::where('user_id', $pengajuan_spj)->paginate(5);
        return view('spj.show', compact('pengajuan_spj'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        // return view('attendance.show', compact('attendance'));
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
            'ket'   => 'required',
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

        return redirect()->route('pengajuan.history_spj')->with('created successfully');
    }

    public function export($id)
    {
        $spj = SPJ::with('detailspj', 'user')->with('user.employee')->find($id);
        // dd($spj);
        $pdf = PDF::loadView('spj.export', [
            'data' => $spj,
        ]);

        return $pdf->stream('Pengajuan SPJ.pdf');
    }

    public function validation_user($id)
    {
        $spj = SPJ::find($id);
        $user_id = Auth::id();

        $spj->validasi_user = $user_id;
        $spj->update();

        return redirect()->route('pengajuan.history_spj')->with('Validasi Sukses');
    }

    public function validation_admin($id)
    {
        $spj = SPJ::find($id);
        $user_id = Auth::id();

        $spj->validasi_admin = $user_id;
        $spj->update();

        return redirect()->route('pengajuan.history_spj')->with('Validasi Sukses');
    }
}
