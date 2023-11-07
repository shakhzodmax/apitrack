<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function integrations()
    {
        $integrations = DB::select('select * from tblintegrations');
        return view('integration.index_integration')->with('integrations', $integrations);
    }
    public function createIntegration()
    {
        return view('dashboard');
    }
}
