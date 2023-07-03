<?php

namespace App\Console\Commands;

use App\Support\Inalto\Import\POI as PoiImport;
use Illuminate\Console\Command;

class PoiUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inalto:poi_update {--truncate : Clear Table } {--skip : skip already imported node id } {--start-from=0 : start import from node id }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncronize old inalto points of interest';

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
        return PoiImport::import($this->option('truncate'), $this->option('skip'), $this->option('start-from'));
    }
}
