<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use App\Models\Holiday;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AddAttendance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AddAttendance:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $employees = User::select('id','name')->get();
        $holidays = Holiday::select('id','date')->get();
        foreach ($employees as $key => $employee) {
            // info($employee->name);
            $status = "Absent";
            if ($holidays) {
                foreach ($holidays as $key => $holiday) {
                    if ($holiday->date == Carbon::now()->format('Y-m-d')) {
                        $status = "Holiday";
                    }
                }
            }
            if (Carbon::now()->dayName == "Friday"){
                $status = "Weekly Holiday";
            }
            Attendance::create(['user_id'=>$employee->id,'date'=>Carbon::now(),'status'=>$status]);
        }
        return 0;
    }
}
