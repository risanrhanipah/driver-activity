<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Risa Nurhanipah',
                'email' => 'risanurhanipah@admin.com',
                'role' => 'admin',
                'password' => bcrypt('1234567'),
            ],
            [
                'name' => 'Ahmad Fatoni',
                'email' => 'ahmadfatoni@user.com',
                'role' => 'user',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Iman Suherman',
                'email' => 'imansuherman@gn.com',
                'role' => 'general affair',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}