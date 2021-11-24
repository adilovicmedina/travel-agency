<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        $roles = [
           ['name' => 'admin'],
           ['name' => 'user'],
           ['name' => 'menager'],
       ];
        DB::table('roles')->insert($roles);
    }
}
