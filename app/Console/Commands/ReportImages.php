<?php

namespace App\Console\Commands;

use App\Support\Inalto\Import\ReportImages as RI;
use Illuminate\Console\Command;

class ReportImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inalto:report_images {--nid= : Node id }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncronize old inalto report images by --nid=';

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
            'nid' => $this->option('nid'),
        ];

        //  $this->output->writeln('--'.$this->option('nid'));

        return RI::import($this->output, $options);
    }
}
