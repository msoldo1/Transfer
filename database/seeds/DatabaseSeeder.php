<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TruckTableSeeder::class);
        $this->call(DriverTableSeeder::class);
        $this->call(OfferTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(CreateUsersSeeder::class);
    }
}
