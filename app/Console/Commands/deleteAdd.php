<?php

namespace App\Console\Commands;

use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Console\Command;

class deleteAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete add when date expired';

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
     * @return int
     */
    public function handle()
    {
        $ads=Ad::all();

        foreach($ads as $ad)
        {
            $o=$ad->duration;
            $b= Carbon::today();
            if( $o< $b){

                $ad->delete();
            }
        }
    }
}
