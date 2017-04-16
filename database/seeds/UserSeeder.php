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

        // Create the test user
        $test_user = factory(App\Models\User::class)->states('test')->create();

        // Give them some messages
        $messages = factory(App\Models\Ui\Message::class, rand(3,6))->make();
        $messages->each(function($message) use ($test_user) {
            $test_user->messages()->save($message);
        });


        // And some groups
        $groups = factory(App\Models\Group::class, rand(1,3))->create();
        $groups->each(function($group) use ($test_user) {
            $test_user->groups()->save($group);
        });

        // Create a few other users
        $new_user = factory(App\Models\User::class, 1)->states('new')->create();

        $users = factory(App\Models\User::class, 4)->create()->each(function($i) {
            $i->groups()->save(factory(App\Models\Group::class)->make());
        });

    }
}
