<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = [
            [
                'user_id' => 2,
                'born_city' => 'Garut',
                'birthday' => '25/10/2003',
                'gender' => 'Perempuan',
                'address' => 'Jl. Nangka V No. 58',
                'religion' => 'Islam',
                'position' => 'Driver',
                'sites' => 'Medan',
                'phone_number' => '083176616241',
            ],
        ];

        foreach ($employee as $key => $value) {
            Employee::create($value);
        }
    }
}