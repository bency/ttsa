<?php

namespace App\Http\Controllers;

use App\QA;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function random()
    {
        $qa = QA::all()->random();
        return view('showqa', ['qa' => $qa]);
    }

    public function show($string)
    {
        $qa = QA::where("subject", "like", "%$string%")->first();
        return view('showqa', ['qa' => $qa]);
    }
}
