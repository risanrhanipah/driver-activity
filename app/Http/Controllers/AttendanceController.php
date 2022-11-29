<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::latest()->paginate(5);
        // $users = User::select("users.id", "users.name", "users.role", "countries.name as country_name")
        // ->leftJoin("attendance", "attendance.user_id", "=", "users.id")
        // ->get();

        return view('attendance.index', compact('attendances'))
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
            'name' => 'required',
            'date' => 'required',
            'in' => 'required',
            'out' => 'required',
            'start' => 'required',
            'finish' => 'required',
            'jumlah_ot' => 'required',
            'km' => 'required',
            'usage' => 'required',
            'progress' => 'required',
            'ket' => 'required',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendance.index')->with('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        $attendances = Attendance::latest()->paginate(5);
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
            'name' => 'required',
            'date' => 'required',
            'in' => 'required',
            'out' => 'required',
            'start' => 'required',
            'finish' => 'required',
            'jumlah_ot' => 'required',
            'km' => 'required',
            'usage' => 'required',
            'progress' => 'required',
            'ket' => 'required',
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendance.index')->with('updated successfully');
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
}
