<?php

namespace App\Console\Commands;

use App\Models\Report;
use Illuminate\Console\Command;

class CategoryChange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inalto:categorychange';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate category_id field in reports table.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reports = Report::query()->get();

        $bar = $this->output->createProgressBar($reports->count());
        $bar->start();

        foreach ($reports as $r) {
            $r->category_id = $r->categories()->first()?->id;
            $r->save();
            $bar->advance();
        }
        $bar->finish();

        $this->info('Category_id updated successfully.');

        return Command::SUCCESS;
    }
}
