<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $users = [
            ['first_name' => 'Admin', 'last_name' => 'Admin', 'username' => 'admin', 'email' => 'admin1@gmail.com', 'phone' => 0000000, 'password' => bcrypt('admin123')],
        ];
        DB::table('users')->insert($users);
    }
}
