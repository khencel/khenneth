<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\DailyHex;
use App\DailyHexHistory;

class ChangeHexagram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:hex';

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
     * @return mixed
     */
    public function handle()
    {
        $currentDate = date('F-d-Y');
        
        $day = date('d', strtotime($currentDate. ' + 1 days'));
        $hex_id = rand(1,64);
        DailyHex::find($day)->update([
            'hexagram_id' => $hex_id
        ]);

        DailyHexHistory::create([
            'hexagram_id' =>$hex_id,
            'date' => $currentDate
        ]);
    }
}
