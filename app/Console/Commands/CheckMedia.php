<?php

namespace App\Console\Commands;

use App\Models\Report;
use Illuminate\Console\Command;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Collection;

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



    private Collection $images;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $this->images = collect(glob(env('OLD_INALTO_FILES')."/**/*.{jpg,jpeg}", GLOB_BRACE))->map(function($f) {

            return [
              'path' =>$f,
              'name' =>pathinfo($f,PATHINFO_BASENAME),
              'filename' =>pathinfo($f,PATHINFO_FILENAME)
            ];
         });
         

        $medias = Media::query()->get();

        foreach ($medias as $m) {
            if ($m) {
                if (! file_exists($m->getPath())) {
                    //$this->output->writeln($m->model_type.' '.$m->model_id);


                    if ($m->model_type == 'App\Models\Report') {
                        $r = Report::find($m->model_id);
                        if (! $r) {
                            $this->output->writeln('###################### report not found');
                            $m->delete();
                        }
                    }

                    $i = $this->images->where('filename',pathinfo($m->getPath(),PATHINFO_FILENAME))->first();

                    

                    if ($i) {
                        $this->output->writeln( "cp ".$i['path']." ".$m->getPath());
                      }

                   // $this->output->writeln('File not found: '.$m->getPath());
                }
            }
        }

        return Command::SUCCESS;
    }




}
