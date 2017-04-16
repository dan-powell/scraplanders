<?php

namespace App\Console\Commands\Time;

use Illuminate\Console\Command;

class TimeSet extends Command
{

    protected $groupRepo;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'time:set {minutes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set the time elapsed to x minutes';

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
        $minutes = $this->argument('minutes');

        if($minutes == null) {
            $minutes = $this->ask('How many minutes?');
        }

        app('time')->setMinutes(intval($minutes));
    }
}
