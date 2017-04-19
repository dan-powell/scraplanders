<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Repositories\Models\GroupRepository;

class UpdateGroupResources implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $repo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
     public function __construct(GroupRepository $groupRepo)
     {
         $this->repo = $groupRepo;
     }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->repo->consumptionUpdate();
    }
}
