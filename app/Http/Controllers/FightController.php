<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FightController extends Controller
{
    public function images()
    {
        return view('fight.image');
    }
}
