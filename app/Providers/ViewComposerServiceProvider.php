<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->view->composer(
            'partials.resources',
            'App\Http\ViewComposers\UserResourcesComposer'
        );
    }
}
