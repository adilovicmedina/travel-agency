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
            ['name' => 'Golubac', 'lantitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 1],
               ['name' => 'Nis', 'lantitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 1],
               ['name' => 'Golubac', 'lantitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 1],
               ['name' => 'Zagubica', 'lantitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 1],
               ['name' => 'Nice', 'lantitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 3],
               ['name' => 'Paris', 'lantitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 3],
               ['name' => ' Montoire', 'lantitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 1],
               ['name' => 'Sahara', 'lantitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 2],
               ['name' => 'Luxor', 'lantitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 2],
               ['name' => 'Kairo', 'lantitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 2],
               ['name' => 'Tokio', 'lantitude' => 44.528797, 'longitude' => 21.984501, 'photo' => '/images/italy.jpg', 'country_id' => 4],
        ];
         DB::table('locations')->insert($locations);
    }
}
