<?php

namespace App\Console\Commands;

use App\Models\Report;
use Illuminate\Console\Command;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CheckMedia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inalto:checkmedia';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check media files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $medias = Media::query()->get();

        foreach ($medias as $m) {
            if ($m) {
                if (! file_exists($m->getPath())) {
                    $this->output->writeln($m->model_type.' '.$m->model_id);
                    if ($m->model_type == 'App\Models\Report') {
                        $r = Report::find($m->model_id);
                        if (! $r) {
                            $this->output->writeln('###################### report not found');
                            $m->delete();
                        }
                    }

                    $this->output->writeln('File not found: '.$m->getPath());
                }
            }
        }

        return Command::SUCCESS;
    }
}
