<?php

use Illuminate\Database\Seeder;

class GovernorateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $governorates = [
             [
                 'name' => 'Gov 1',
                 'status' => 1
             ],
             [ 
                 'name' => 'Gov 2',
                 'status' => 1
             ],
         ];
 
         factory(App\Governorate::class)->createMany($governorates);
     }
}
