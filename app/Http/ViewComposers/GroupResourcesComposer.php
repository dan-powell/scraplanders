<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\Group;

class GroupResourcesComposer {

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = \Auth::user();
        $group = Group::where('user_id', $user->id)->first();
        $view->with('group', $group);
    }
}