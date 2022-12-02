<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('user')->latest()->paginate(5);

        return view('employee.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::latest()->paginate(5);
        return view('employee.create', compact('employees'))
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
            'nik' => 'required',
            'name' => 'required',
            'born_city' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'position' => 'required',
            'sites' => 'required',
            'phone_number' => 'required',
            'email' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        Employee::create([
            'nik' => $request->nik,
            'born_city' => $request->born_city,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'address' => $request->address,
            'religion' => $request->religion,
            'position' => $request->position,
            'sites' => $request->sites,
            'phone_number' => $request->phone_number,
            'user_id' => $user->id,
        ]);

        return redirect()->route('employee.index')->with('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $employees = Employee::with('user')->latest()->paginate(5);

        return view('employee.show', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $emp)
    {
        $request->validate([
            'user_id' => 'required',
            'nik' => 'required',
            'name' => 'required',
            'born_city' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'position' => 'required',
            'sites' => 'required',
            'phone_number' => 'required',
            'email' => 'required'
        ]);

        $user = User::find($request->user_id);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = 'user';

        if ($request->password != "") {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        $employee = Employee::where('user_id', $request->user_id);
        $employee->update([
            'nik' => $request->nik,
            'born_city' => $request->born_city,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'address' => $request->address,
            'religion' => $request->religion,
            'position' => $request->position,
            'sites' => $request->sites,
            'phone_number' => $request->phone_number,
            'user_id' => $user->id,
        ]);

        return redirect()->route('employee.index')->with('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->user->delete();

        return redirect()->route('employee.index')->with('deleted successfully');
    }
}