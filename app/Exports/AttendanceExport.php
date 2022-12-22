<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendanceExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Attendance::with('user')->get();
    }

    public function map($attendance): array
    {
        return [
            $attendance->id,
            $attendance->user->name,
            $attendance->date_in,
            $attendance->date_out,
            $attendance->start_ot,
            $attendance->finish_ot,
            $attendance->jumlah_ot,
            $attendance->km_in,
            $attendance->km_out,
            $attendance->usage,
            $attendance->ket,
            $attendance->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAMA',
            'DATE IN',
            'DATE OUT',
            'START OT',
            'FINISH OT',
            'JUMLAH OT',
            'KM IN',
            'KM OUT',
            'USAGE',
            'KETERANGAN',
            'CREATED AT',
        ];
    }
}