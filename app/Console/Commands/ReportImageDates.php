<?php

namespace App\Console\Commands;

use App\Models\Report;
use DateTime;
use Exception;
use Illuminate\Console\Command;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ReportImageDates extends Command
{
    protected $signature = 'inalto:update-report-images-dates';

    protected $description = 'Update Spatie medialibrary dates from EXIF metadata or file modification date.';

    public function handle()
    {
        // Get all Report models that have media attached
        $reports = Report::with('media')->get();
        //create progress bar
        $bar = $this->output->createProgressBar($reports->count());

        $bar->start();

        foreach ($reports as $report) {
            $bar->advance();
            $mediaItems = $report->media;
            // $this->info('id'.$report->id);
            //ray($mediaItems);

            foreach ($mediaItems as $mediaItem) {
                $date = null;

                if ($mediaItem['collection_name'] != 'report_photos') {
                    continue;
                }
                // Get the file path and check if it exists
                $filePath = $mediaItem->getPath();

                if (! file_exists($filePath)) {
                    continue;
                }

                $dateTime = new DateTime('@'.filectime($filePath));

                $date = $dateTime->format('Y-m-d H:i:s');

                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                if (strtolower($fileExtension) === 'png') {
                    // The file extension is PNG
                    continue;
                }

                try {
                    $exif = exif_read_data($filePath);
                    if (array_key_exists('FileDateTime', $exif)) {
                        $dateTime = new DateTime('@'.$exif['FileDateTime']);

                        $date = $dateTime->format('Y-m-d H:i:s');
                    }
                } catch (Exception $e) {
                    //echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
                if (array_key_exists('DateTime', $exif)) {
                    $dateTime = new DateTime($exif['DateTime']);

                    if (
                        $dateTime->format('Y-m-d H:i:s') != '1970-01-01 00:00:00' &&
                        $dateTime->format('Y-m-d H:i:s') != '0000-00-00 00:00:00' &&
                        $dateTime->format('Y-m-d H:i:s') != '-0001-11-30 00:00:00'
                        ) {
                        $date = $dateTime->format('Y-m-d H:i:s');
                    }
                }

                if ($date) {
                    $mediaItem->created_at = $date;
                    $mediaItem->save();
                }
            }
            // Update the media item's date
            //$mediaItem->created_at = $dateTime->format('Y-m-d H:i:s');
            //$mediaItem->save();
        }
        $bar->finish();
        $this->info('Media dates updated successfully.');
    }
}
