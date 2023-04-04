<?php

use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
             [
                 'name' => 'Area 1',
                 'governorate_id' => '1',
                 'status' => 1
                
             ],
             [ 
                 'name' => 'Area 2',
                 'governorate_id' => '2',
                 'status' => 1
               
             ]
         ];
 
         factory(App\Area::class)->createMany($areas);
     }
}
