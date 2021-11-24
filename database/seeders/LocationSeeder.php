<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('locations')->truncate();

         $locations = [
            ['name' => 'Golubac', 'latitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 1],
               ['name' => 'Nis', 'latitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 1],
               ['name' => 'Golubac', 'latitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 1],
               ['name' => 'Zagubica', 'latitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 1],
               ['name' => 'Nice', 'latitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 3],
               ['name' => 'Paris', 'latitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 3],
               ['name' => ' Montoire', 'latitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 1],
               ['name' => 'Sahara', 'latitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 2],
               ['name' => 'Luxor', 'latitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 2],
               ['name' => 'Kairo', 'latitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 2],
               ['name' => 'Tokio', 'latitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 4],
        ];
         DB::table('locations')->insert($locations);
    }
}
