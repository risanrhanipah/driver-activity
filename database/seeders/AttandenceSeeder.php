<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Seeder;

class AttandenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attendance = [
            [
                'date' => '01/12/2022',
                'user_id' => 2,
                'in' => '07:00',
                'out' => '16:00',
                'start' => '09:00',
                'finish' => '14:00',
                'jumlah_ot' => '98',
                'km' => '200km',
                'usage' => '10',
                'progress' => '100%',
                'ket' => 'Done',
            ],
        ];

        foreach ($attendance as $key => $value) {
            Attendance::create($value);
        }
    }
}