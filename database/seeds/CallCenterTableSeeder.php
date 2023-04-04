<?php

use Illuminate\Database\Seeder;

class CallCenterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $callCenter = [
            [
                'agent_name' => 'Agent 1',
                'contact_number' => '+96-123456789',
                'username' => 'agent1',
                'password' => 'Agent1@#gnp',
                'status' => '1',
            ],
            [
                'agent_name' => 'Agent 2',
                'contact_number' => '+96-123456789',
                'username' => 'agent2',
                'password' => 'Agent2@#gnp',
                'status' => '1',
            ]
        ];

        factory(App\CallCenter::class)->createMany($callCenter);
    }
} 