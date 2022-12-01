<?php

namespace App\Http\Controllers;

use App\Models\SPJ;
use Illuminate\Http\Request;

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
        $pengajuan_spj = SPJ::latest()->paginate(5);
        return view('spj.create', compact('pengajuan_spj'))
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
            'date_pengajuan' => 'required',
            'spj' => 'required',
            'ket' => 'required',
        ]);

        SPJ::create($request->all());

        return redirect()->route('pengajuan_spj.show')->with('created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SPJ  $pengajuanSPJ
     * @return \Illuminate\Http\Response
     */
    public function show(SPJ $pengajuanSPJ)
    {
        $pengajuan_spj = SPJ::latest()->paginate(5);
        return view('spj.show', compact('pengajuan_spj'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SPJ  $pengajuanSPJ
     * @return \Illuminate\Http\Response
     */
    public function edit(SPJ $pengajuanSPJ)
    {
        return view('spj.edit', compact('pengajuan_spj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SPJ  $pengajuanSPJ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SPJ $pengajuanSPJ)
    {
        $request->validate([
            'name' => 'required',
            'date_pengajuan' => 'required',
            'spj' => 'required',
            'ket' => 'required',
        ]);

        $pengajuanSPJ->update($request->all());

        return redirect()->route('pengajuan_spj.index')->with('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SPJ  $pengajuanSPJ
     * @return \Illuminate\Http\Response
     */
    public function destroy(SPJ $pengajuanSPJ)
    {
        $pengajuanSPJ->delete();

        return redirect()->route('pengajuan_spj.index')->with('deleted successfully');
    }
}