<?php

namespace App\Console\Commands;

use App\Support\Inalto\Import\ReportSyncCreated;
use Illuminate\Console\Command;

class ReportSyncDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inalto:report_sync_date {--nid= : Node id }  {--skip : skip already imported node id } {--start-from=0 : start sync from node id } {--new : sync date new relations } {--dry-run : dry run }';

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
        $options = [
            'skip' => $this->option('skip'),
            'start_from' => $this->option('start-from'),
            'nid' => $this->option('nid'),
            'new' => $this->option('new'),
            'dry_run' => $this->option('dry-run'),
        ];

        //  $this->output->writeln('--'.$this->option('nid'));

        return ReportSyncCreated::sync($this->output, $options);
    }
}
