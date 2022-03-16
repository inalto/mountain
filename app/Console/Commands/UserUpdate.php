<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Support\Inalto\Import\User as UserImport;

class UserUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inalto:user_update {--uid=0 : userid to import } { --truncate : clear previously imported avatars } {--dryrun : run without import }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncronize old inalto users';

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
        //ray($this->option('dryrun'));
        $this->output->writeln('Updating inalto users...');
        return UserImport::import($this->output,$this->option('uid'),$this->option('truncate'),$this->option('dryrun'));
        $this->output->writeln('Done.');

    }
}
