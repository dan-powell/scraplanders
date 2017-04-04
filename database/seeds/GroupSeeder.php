<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Group::class, 20)->create();
    }
}
