<?php

namespace App\Console\Commands;
use App\Models\Capsule;
use Illuminate\Console\Command;

class RevealCapsules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reveal-capsules';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // reveal capsules whose reveal date has passed
        $count = Capsule::where('is_revealed', false)
            ->whereDate('reveal_date', '<=', now())
            ->update(['is_revealed' => true]);

        $this->info("$count capsule(s) revealed.");
    }
}
