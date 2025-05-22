<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function komunitas()
    {
        return view('pages.komunitas');
    }

    public function statistik()
    {
        return view('pages.statistik');
    }

}
