<?php

namespace App\Console\Commands;

use App\Models\Report;
use App\Models\Poi;
use Illuminate\Console\Command;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Collection;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

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


      $medias = Media::query()->get();

        foreach ($medias as $m) {
            if ($m) {
                if (! file_exists($m->getPath())) {

                    switch ($m->model_type):

                      case 'App\Models\Report':
                        $r = Report::find($m->model_id);
                        if (! $r) {
                            $this->output->writeln('###################### report not found');
                            $m->delete();
                        }


                      break;

                      case 'App\Models\Poi':
                        $r = Poi::find($m->model_id);
                        if (! $r) {
                            $this->output->writeln('###################### poi not found');
                            $m->delete();
                        }
                        // check if image exists on the filesystem


                      break;
                    endswitch;

                   // echo pathinfo($m->getPath(),PATHINFO_FILENAME)."\n";
                    $old=collect($this->getOldMedia(pathinfo($m->getPath(),PATHINFO_BASENAME)));


                    $this->output->writeln($old->first()." --> " .$m->getPath() );

                    if ($old->first()) {
                      $this->copyFileWithDirectories($old->first(),$m->getPath());
                    } else {
                      $this->output->writeln('File not found for: '.$m->getPath());
                    }
                    /*
                    $i = $this->images->where('filename',pathinfo($m->getPath(),PATHINFO_FILENAME))->first();



                    if ($i) {
                        $this->output->writeln( "cp ".$i['path']." ".$m->getPath());
                      }
*/
                   // $this->output->writeln('File not found: '.$m->getPath());
                }
            }
        }

        return Command::SUCCESS;
    }



    private function getOldMedia($filename)
    {

      return $this->findFiles(env('OLD_INALTO_FILES'), '#/'.$filename.'#i');

    }

    private function findFiles($directory, $pattern)
    {
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

        $files = [];
        foreach ($iterator as $file) {
            if ($file->isFile() && preg_match($pattern, $file->getPathname()) && ! preg_match('#styles#', $file->getPathname())) {
                $files[] = $file->getPathname();
            }
        }

        return $files;
    }

    private function copyFileWithDirectories($source, $destination)
    {
        $directory = pathinfo($destination, PATHINFO_DIRNAME);

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        return copy($source, $destination);
    }

}
