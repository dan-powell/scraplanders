<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Repositories\Models\GroupRepository;

class CharacterEncounter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $character;

    /**
     * Create a new job instance.
     *
     * @return void
     */
     public function __construct($character)
     {
         $this->character = $character;

     }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $this->character->hp = 1;
        $this->character->save();

    }
}
