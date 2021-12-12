<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Support\Inalto\Import\Report as ReportImport;


class ReportUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inalto:report_update {--nid= : Node id } {--truncate : Clear Table } {--skip : skip already imported node id } {--start-from=0 : start import from node id } {--dry-run : dry run }';

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
            'start-from' => $this->option('start-from'),
            'nid' => $this->option('nid'),
            'dry_run' => $this->option('dry-run'),
        ];

      //  $this->output->writeln('--'.$this->option('nid'));

        return ReportImport::import($this->output,$options);
    }

}
