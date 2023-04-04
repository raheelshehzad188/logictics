<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'name' => 'Out for delivery',
                'parent_id' => 0
            ],
            [ 
                'name' => 'Return to bank',
                'parent_id' => 0
            ],
            [ 
                'name' => 'Delivered',
                'parent_id' =>0
            ],
            [ 
                'name' => 'Undelivered',
                'parent_id' => 0
            ],
            [ 
                'name' => 'Others',
                'parent_id' =>0
            ],
            [ 
                'name' => 'Mobile Switch OFF',
                'parent_id' => 5
            ],
            [ 
                'name' => 'Unanswered',
                'parent_id' => 5
            ],
            [ 
                'name' => '	Not reachable',
                'parent_id' => 5
            ],
        ];

        factory(App\Status::class)->createMany($status);
    }
}
 