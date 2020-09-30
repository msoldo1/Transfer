<?php

use Illuminate\Database\Seeder;

class TruckTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Truck::class)->create();
    }
}
