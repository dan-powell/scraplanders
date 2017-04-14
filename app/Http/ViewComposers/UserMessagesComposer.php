<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Repositories\Ui\MessageRepository;

class UserMessagesComposer {

    private $repo;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(MessageRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('messages', $this->repo->all());
    }
}
