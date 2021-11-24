<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->truncate();

        $role_user = [
           ['role_id' => 1, 'user_id' => 1],
       ];
        DB::table('role_user')->insert($role_user);
    }
}
