<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\GroupRepository;
use App\Jobs\UpdateGroupResources;

class UpdateResources extends Command
{

    protected $groupRepo;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resources:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates resources';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GroupRepository $groupRepo)
    {
        parent::__construct();
        $this->groupRepo = $groupRepo;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        dispatch(new UpdateGroupResources($this->groupRepo));

    }
}
