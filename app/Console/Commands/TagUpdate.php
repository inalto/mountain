<?php

namespace App\Console\Commands;

use App\Support\Inalto\TagImport;
use Illuminate\Console\Command;

class TagUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inalto:tag_update {--truncate : Clear Table }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncronize old inalto tags';

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
        return TagImport::import($this->option('truncate'));
    }
}
