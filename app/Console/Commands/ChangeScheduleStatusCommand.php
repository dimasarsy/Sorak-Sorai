<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ChangeScheduleStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:scheduleStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will change the schedule status to not available';

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
        DB::table('schedules')
        ->where('status', "available")
        ->where('availableScheduleDate', '<', Carbon::now()->toDateTimeString())
        ->update(['status' => 'not available']);

        $this->info('Status Updated Successfully');
    }
}
