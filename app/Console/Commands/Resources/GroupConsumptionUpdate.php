<?php

namespace App\Console\Commands\Resources;

use Illuminate\Console\Command;
use App\Repositories\Models\GroupRepository;
use App\Jobs\UpdateGroupResources;

class GroupConsumptionUpdate extends Command
{

    protected $repo;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'group:consume {--queue}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Characters in group consume resources';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GroupRepository $groupRepo)
    {
        parent::__construct();
        $this->repo = $groupRepo;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->option('queue')) {
            // Send the job to the queue
            dispatch(new UpdateGroupResources($this->repo));
        } else {
            $this->repo->consumptionUpdate();
        }
    }
}
