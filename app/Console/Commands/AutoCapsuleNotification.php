<?php

namespace App\Console\Commands;
use App\Http\Controllers\User\CapsuleController;
use Mail;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Capsule;
use App\Mail\CapsuleReveal;

class AutoCapsuleNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-capsule-notification';

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
        $capsules = Capsule::whereDate
        ('reveal_date', now()->toDateString())
            ->get();


        if ($capsules->count() > 0) {

            foreach ($capsules as $capsule) {

                $user = $capsule->user;

                if ($user && $user->email) {
                    Mail::to($user)->send(new CapsuleReveal($capsule));
                }

                $this->info('X capsules processed');


            }

        }

        return 0;
    }
}
