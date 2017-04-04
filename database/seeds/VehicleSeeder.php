<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = factory(App\Models\Vehicle::class, 20)->create();
    }
}
