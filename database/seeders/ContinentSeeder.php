<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('continents')->truncate();

        $continents = [
            ['name' => 'Europe'],
            ['name' => 'Africa'],
            ['name' => 'Australia'],
            ['name' => 'North America'],
            ['name' => 'South America'],
            ['name' => 'Asia'],
            ['name' => 'Antarctica'],
        ];
        DB::table('continents')->insert($continents);
    }
}
