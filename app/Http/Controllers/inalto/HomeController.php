<?php

namespace App\Http\Controllers\inalto;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('inalto.home');
    }
}
