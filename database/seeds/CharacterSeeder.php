<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = factory(App\Models\Character::class, 100)->create();
    }
}
