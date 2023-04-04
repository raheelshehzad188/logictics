<?php

use Illuminate\Database\Seeder;

class BlockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blocks = [
            [
                'name' => 'Block 1',
                'area_id' => '1',
                'status' => 1
               
            ],
            [ 
                'name' => 'Block 2',
                'area_id' => '2',
                'status' => 1
              
            ]
        ];

        factory(App\Block::class)->createMany($blocks);
    }
}