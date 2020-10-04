<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;

use App\Models\Report;


class PagesController extends Controller
{
    //
    public function home() {
        $reports=Report::all()->take(10);
        return View::make('pages.home',['reports'=>$reports]);
    }
}
