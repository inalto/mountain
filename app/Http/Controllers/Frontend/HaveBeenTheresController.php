<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Category;
use App\Models\Tag;
use App\Models\HaveBeenThere;
use App\Support\Inalto\ParseReport;

class HaveBeenTheresController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
       
                return view('frontend.have-been-there.index');
   }
    
    public function tag($tag = null)
    {
        
        
        if ($tag) {
            $t = Tag::where('slug', $tag)->first();
           // ray($t);
            if ($t) {
                return view('frontend.have-been-there.index', ['tag'=>$t]);
            } else {
                abort(404);
            }
        } else {
        
                return view('frontend.have-been-there.index', ['tag'=>null]);
        }
    }

}
