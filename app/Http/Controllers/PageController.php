<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
}
