<?php

use Illuminate\Database\Seeder;

class DriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $driver = [
             [
                 'driver_name' => 'Driver 1',
                 'contact_number' => +96-12345689,
                 'status' => 1
             ],
             [ 
                'driver_name' => 'Driver 1',
                'contact_number' => +96-12345689,
                'status' => 1
             ],
         ];
 
         factory(App\Driver::class)->createMany($driver);
     }
}
