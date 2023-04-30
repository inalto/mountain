<?php

namespace App\Support\Inalto;

use App\Models\Report;
use App\Models\ReportTag;
use App\Models\Tag;
use DB;

class TagImport
{
    public static function import($truncate = false)
    {
        if ($truncate) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('tags')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        $tags = DB::connection('mysqlold')->table('taxonomy_term_data')->where('vid', 1)->get();

        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(
                [
                    'tid' => $tag->tid,
                ],
                [
                    'name' => $tag->name,
                    'description' => $tag->description,
                    'tid' => $tag->tid,
                ]);

            //     $tags = DB::connection('mysqlold')->table('taxonomy_term_data')->where('vid',1)->where('name','Italia')->get();

            //$tags->tid;

            $rels = DB::connection('mysqlold')
              ->table('field_data_field_tags')
              ->where('field_tags_tid', $tag->tid)
              ->where('bundle', 'relazioni')
              ->get();
            //entity_id è node id
            foreach ($rels as $rel) {
                $rid = Report::where('nid', $rel->entity_id)->get()->pluck('id')->first();
                if ($rid) {
                    $rel = ReportTag::firstOrCreate(
                        [
                            'report_id' => $rid,
                            'tag_id' => $tag->id,
                        ]
                    );
                    $rel->save();
                }
            }
        }
    }
}
