<?php

namespace App\Console\Commands\Time;

use Illuminate\Console\Command;

class TimeUpdate extends Command
{

    protected $groupRepo;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'time:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increments time & year by value set in config';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        app('time')->update();
    }
}
