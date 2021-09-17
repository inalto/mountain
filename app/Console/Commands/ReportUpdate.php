<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Report;
use Log;
use Swift_Plugins_Loggers_EchoLogger;
use App\Support\Inalto\ReportImport;


class ReportUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inalto:report_update {--truncate : Clear Table } {--skip : skip already imported node id } {--start-from=0 : start import from node id }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncronize old inalto reports';

    public $loadImages = false;

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

        return ReportImport::import($this->option('truncate'),$this->option('skip'),$this->option('start-from'));
    }

}
