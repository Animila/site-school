<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecentController extends Controller
{
    public function getRecent() {
        return view('content/recent');
    }
}
