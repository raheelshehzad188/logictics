<?php

use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $card = [
            [
                'agent_id' => 1,
                'driver_id' => 1,
                'batch_no' => 0001,
                'batch_sr_no' => 0001,
                'card_no' => 0101,
                'customer_name' => 'Customer 1',
                'cif_no' => 'CN-01',
                'civil_id' => 'C-001',
                'mobile_no' => '0123456789',
                'telephone_no' => '0123456789',
                'delivery_date' => '2022-04-15',
                'governorate_id' => 1,
                'area_id' => 1,
                'block_id' => 1,
                'street' => 'Street 1',
                'avenue' => 'Avenue 1',
                'house_no' => 'House 1',
                'floor' => 'Floor-1',
                'flat' => 'Flat-A',
                'status' => 0,
                'remark' => ''
            ],
            [
                'agent_id' => 1,
                'driver_id' => 1,
                'batch_no' => 0001,
                'batch_sr_no' => 0002,
                'card_no' => '0102',
                'customer_name' => 'Customer 2',
                'cif_no' => 'CN-01',
                'civil_id' => 'C-001',
                'mobile_no' => '0123456789',
                'telephone_no' => '0123456789',
                'delivery_date' => '2022-04-15',
                'governorate_id' => 1,
                'area_id' => 1,
                'block_id' => 1,
                'street' => 'Street 1',
                'avenue' => 'Avenue 1',
                'house_no' => 'House 2',
                'floor' => 'Floor-1',
                'flat' => 'Flat-A',
                'status' => 0,
                'remark' => ''
            ]
        ];

        factory(App\Cards::class)->createMany($card);
    }
}