<?php

namespace App\Support\Inalto\Import;

use App\Models\Report as R;
use App\Models\User;
use Carbon\Carbon;
use DB;

class ReportSyncCreated
{
    public static function sync($o, $options)
    {
        extract($options);

        $o->writeln('start');
        $qry = DB::connection('mysqlold')->table('node')->where('type', 'relazioni')->where('status', 1);

        if ($new) {
            $start = R::query()->orderBy('nid', 'desc')->first()->nid;
            $qry->where('node.nid', '>', $start);
        }

        if ($start_from) {
            $qry->where('node.nid', '>=', $start_from);
        }

        if ($nid) {
            $qry->where('node.nid', '=', $nid);
        }

        $qry->orderBy('node.nid');

        $reports = $qry->get();
        $bar = $o->createProgressBar(count($reports));

        foreach ($reports as $key => $value) {
            if (! User::where('id', $value->uid)->first()) {
                continue;
            }
            /*
            * Skip already imported node ids
            */
            if ($skip) {
                if (R::where('nid', $value->nid)->get()->first()) {
                    $bar->advance();
                    continue;
                }
            }
            $r = R::where(['nid' => $value->nid])->first();
            if ($r) {
                $r->created_at = Carbon::createFromTimestamp($value->created)->format('Y-m-d H:i:s');
                $r->updated_at = Carbon::createFromTimestamp($value->changed)->format('Y-m-d H:i:s');

                if (! $dry_run) {
                    $r->save();
                } else {
                    $o->writeln('Title->'.$value->title);
                    $o->writeln('uid->'.$value->uid);
                    $o->writeln('created->'.$r->created_at);
                }
            }

            $bar->advance();
        }
    }
}
