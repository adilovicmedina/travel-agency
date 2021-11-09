<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                      DB::table('tours')->truncate();
 
        $tours = [
            ['name' => 'Djerdapska klisura','country_id' => 1, 'start_date'=> '2021-05-02', 'end_date' => '2021-05-12'],
            ['name' => 'Djavolja varos','country_id' => 1, 'start_date'=> '2021-05-02', 'end_date' => '2021-05-12'],
            ['name' => 'Golubacka tvrdjava','country_id' => 1, 'start_date'=> '2021-05-02', 'end_date' => '2021-05-12'],
            ['name' => 'Krupajsko vrelo','country_id' => 1, 'start_date'=> '2021-05-02', 'end_date' => '2021-05-12'],
            ['name' => 'Côte dAzur','country_id' => 3, 'start_date'=> '2021-05-02', 'end_date' => '2021-05-12'],
            ['name' => 'Paris','country_id' => 3, 'start_date'=> '2021-05-02', 'end_date' => '2021-05-12'],
            ['name' => 'Châteaux doline Loire','country_id' => 3, 'start_date'=> '2021-05-02', 'end_date' => '2021-05-12'],
            ['name' => 'Adventure Safari','country_id' => 2, 'start_date'=> '2021-05-02', 'end_date' => '2021-05-12'],
            ['name' => 'Luxor','country_id' => 2, 'start_date'=> '2021-05-02', 'end_date' => '2021-05-12'],
            ['name' => 'Kairo','country_id' => 2, 'start_date'=> '2021-05-02', 'end_date' => '2021-05-12'],
            ['name' => 'Tokio','country_id' => 4, 'start_date'=> '2021-05-02', 'end_date' => '2021-05-12'],
        ];
 
        DB::table('tours')->insert($tours);
    }
}
