<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CategoryLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories_locations')->truncate();

        $categories_locations = [
            ['location_id' => 1, 'category_id' => 2],
            ['location_id' => 2, 'category_id' => 1],
            ['location_id' => 3, 'category_id' => 1],
            ['location_id' => 4, 'category_id' => 1],
            ['location_id' => 5, 'category_id' => 2],
            ['location_id' => 6, 'category_id' => 1],
            ['location_id' => 7, 'category_id' => 1],
            ['location_id' => 8, 'category_id' => 3],
            ['location_id' => 9, 'category_id' => 1],
            ['location_id' => 10, 'category_id' => 1],
            ['location_id' => 11, 'category_id' => 1],
        ];
        DB::table('categories_locations')->insert($categories_locations);
    }
}
