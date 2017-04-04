<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test_user = factory(App\Models\User::class)->states('test')->create();

        $test_user->group()->save(factory(App\Models\Group::class)->make());

        $new_user = factory(App\Models\User::class, 1)->states('new')->create();

        $users = factory(App\Models\User::class, 4)->create()->each(function($i) {
            $i->group()->save(factory(App\Models\Group::class)->make());
        });

    }
}
