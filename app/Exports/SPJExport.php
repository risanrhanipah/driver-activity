<?php

namespace App\Exports;

use App\Models\SPJ;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SPJExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return SPJ::with('user')->get();
    }

    public function map($pengajuan_spj): array
    {
        return [
            $pengajuan_spj->id,
            $pengajuan_spj->user->name,
            $pengajuan_spj->start_date,
            $pengajuan_spj->end_date,
            (strtotime($pengajuan_spj->end_date) - strtotime($pengajuan_spj->start_date)) / 60 / 60 / 24,
            $pengajuan_spj->project,
            $pengajuan_spj->ket,
            $pengajuan_spj->description,
            $pengajuan_spj->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAMA',
            'START DATE',
            'END DATE',
            'DAYS TOTAL',
            'PROJECT',
            'REMARKS',
            'DESCRIPTION',
            'CREATED AT',
        ];
    }
}