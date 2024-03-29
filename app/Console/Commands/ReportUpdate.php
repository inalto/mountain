<?php

namespace App\Console\Commands;

use App\Support\Inalto\Import\Report as ReportImport;
use Illuminate\Console\Command;

class ReportUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inalto:report_update {--nid= : Node id } {--truncate : Clear Table } {--skip : skip already imported node id } {--start-from=0 : start import from node id } {--new : import new relations } {--dry-run : dry run }';

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
            'truncate' => $this->option('truncate'),
            'skip' => $this->option('skip'),
            'start_from' => $this->option('start-from'),
            'nid' => $this->option('nid'),
            'new' => $this->option('new'),
            'dry_run' => $this->option('dry-run'),
        ];

        //  $this->output->writeln('--'.$this->option('nid'));

        return ReportImport::import($this->output, $options);
    }
}
