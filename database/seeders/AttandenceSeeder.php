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
                'user_id' => 2,
                'date' => '2022/11/01 07:00:00',
                'km' => 200,
                'usage' => 10,
                'progress' => 100,
                'ket' => 'Done',
                'status' => 'in',
            ],
        ];

        foreach ($attendance as $key => $value) {
            Attendance::create($value);
        }
    }
}
