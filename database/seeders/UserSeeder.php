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
            ['username' => 'admin', 'email' => 'admin1@gmail.com', 'password' => bcrypt('admin123')],
        ];
        DB::table('users')->insert($users);
    }
}
