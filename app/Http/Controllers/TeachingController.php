<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeachingController extends Controller
{
   public function open_teaching(){
    return view('teach', [
        'time' => now()
    ]);
   }
   public function do_some_practice(){
    return view('practice.do_practice')->with('practice_time', now())
    ->with('practice_time1', now()->subDay())
    ->with('practice_time2', now()->tomorrow());
   }
}
