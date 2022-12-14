<?php

namespace App\Http\Controllers;

use App\Exports\AttendanceExport;
use PDF;
use DateTime;
use DateInterval;
use App\Models\User;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
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

        $attendances = User::with(["attendance", 'employee'])->where('role', 'driver')->paginate(5);
        // dd($attendances);

        // if ($attendances->employee == null) {
        //     return redirect()->route('employee.create');
        // }

        return view('attendance.index', compact('attendances'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function history()
    {
        // $attendances = Attendance::latest()->paginate(5);
        // $attendances = User::select("users.id", "users.name", "users.role", DB::raw('COUNT(attendance.user_id) as totalAbsen'))
        //     ->leftJoin("attendance", "attendance.user_id", "=", "users.id")
        //     ->latest("attendance.created_at")->paginate(5);

        $attendances = Attendance::with(["user", 'user.employee'])->where('user_id', auth()->user()->id)->paginate(5);
        // dd($attendances);

        // if ($attendances->employee == null) {
        //     return redirect()->route('employee.create');
        // }

        return view('attendance.history', compact('attendances'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attendances = Attendance::latest()->paginate(5);
        return view('attendance.create', compact('attendances'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'km' => 'required|numeric',
            'ket' => 'required',
        ]);

        // dd($request);
        $check = Attendance::whereDate('date_in', '2022-12-09')->where('user_id', auth()->user()->id)->first();
        // $check = Attendance::whereDate('date_in', date('Y-m-d'))->where('user_id', auth()->user()->id)->first();
        // dd($check);
        if ($request->status == 'in') {

            if ($check == null) {
                $data['date_in'] = '2022-12-09 08:30:00'; // Tanggal Input Menjadi Tanggal Absensi
                // $data['date_in'] = date('Y-m-d H:i:s'); // Tanggal Input Menjadi Tanggal Absensi
                $data['km_in'] = $request->km;
                $data['ket'] = $request->ket;
                $data['user_id'] = auth()->user()->id;

                $attendance = Attendance::create($data);
                // dd($attendance);
            }
        } else {
            $in = $check->date_in;
            $tanggal_in = new DateTime($in);
            $tanggal_out = new DateTime('2022-12-09 17:00:00');
            // $tanggal_out = new DateTime();
            $selisih = $tanggal_in->diff($tanggal_out);

            if ($selisih->h > 8) {
                $data['start_ot'] = $tanggal_in->add(new DateInterval('PT8H'))->format('H:i:s');
                $data['finish_ot'] = $tanggal_out->format('H:i:s');
                $data['jumlah_ot'] = $selisih->h - 8;
            } else {
                $data['start_ot'] = 0;
                $data['finish_ot'] = 0;
                $data['jumlah_ot'] = 0;
            }

            if ($check->count() > 0) {
                $data['date_out'] = $tanggal_out; // Tanggal Input Menjadi Tanggal Absensi
                // $data['date_out'] = date('Y-m-d H:i:s'); // Tanggal Input Menjadi Tanggal Absensi
                $data['km_out'] = $request->km;
                $data['usage'] = intval($request->km) - intval($check->km_in);
                // dd($data);
                $check->update($data);
            }
        }

        // Attendance::create($request->all());

        return redirect()->route('attendance.history')->with('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($attendance)
    {
        $attendances = Attendance::where('user_id', $attendance)->paginate(5);
        return view('attendance.show', compact('attendances'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        // return view('attendance.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        // $attendance = Attendance::latest()->paginate(5);
        // return view('attendance.edit', compact('attendance'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);

        return view('attendance.edit', compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'in' => 'required',
            'out' => 'required',
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendance.show')->with('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendance.index')->with('deleted successfully');
    }

    public function timesheet($id)
    {
        $employee = Employee::with('user')->where('user_id', $id)->first();

        $timesheet = Attendance::with('user')->with('user.employee')->where('user_id', $id)->get();
        // dd($timesheet);
        $pdf = PDF::loadView('timesheet.show', [
            'attendance' => $timesheet,
            'employee' => $employee,
        ]);

        return $pdf->stream('Timesheet.pdf');
    }

    public function history_timesheet()
    {
        $attendances = User::with(["attendance", 'employee'])->where('role', 'driver')->paginate(5);

        return view('timesheet.index', compact('attendances'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function list_timesheet($attendance)
    {
        $attendances = Attendance::where('user_id', $attendance)->paginate(5);
        return view('timesheet.list', compact('attendances'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function report()
    {
        return Excel::download(new AttendanceExport, 'attendance.xlsx');
    }

    public function report_attendance()
    {
        $attendances = Attendance::with(["user", 'user.employee'])->paginate(5);

        return view('attendance.report', compact('attendances'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function timesheet_driver()
    {
        // $attendances = Attendance::latest()->paginate(5);
        // $attendances = User::select("users.id", "users.name", "users.role", DB::raw('COUNT(attendance.user_id) as totalAbsen'))
        //     ->leftJoin("attendance", "attendance.user_id", "=", "users.id")
        //     ->latest("attendance.created_at")->paginate(5);

        $attendances = Attendance::with(["user", 'user.employee'])->where('user_id', auth()->user()->id)->paginate(5);
        // dd($attendances);

        // if ($attendances->employee == null) {
        //     return redirect()->route('employee.create');
        // }

        return view('timesheet.history', compact('attendances'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}