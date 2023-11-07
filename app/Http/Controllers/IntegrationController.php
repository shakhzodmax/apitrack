<?php

namespace App\Http\Controllers;

use App\Models\Integration;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IntegrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $integrations = DB::select('select * from tblintegrations');
        return view('integration.index_integration')->with('integrations', $integrations);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('integration.create_integration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->validate(Integration::$createRules, Integration::$createRulesMessages, Integration::$createRulesAttributes);

        $insertIntegration = DB::table('tblintegrations')->insertGetId(array(
            'NAME'      => $inputs['NAME'],
            'TITLE'      => $inputs['TITLE'],
            'DATE01'      => $inputs['DATE01'],
            'DATE02'      => $inputs['DATE02'],
            'INT01'      => $inputs['INT01'],
            'VAL01'      => $inputs['VAL01']
        ));

        if($insertIntegration) {
            return redirect('/integration')->with('success', 'Интеграция кушилди!');
        }
        return redirect()->back()->with('error', 'Кушишда хатолик!')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('integration.show_integration');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $integration = DB::table('tblintegrations')->where('id', $id)->first();
        $originalDate = $integration->DATE01;
        $newDate = date("Y-m-d", strtotime($originalDate));

        return view('integration.edit_integration')->with('integration', $integration)->with('newDate', $newDate);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inputs = $request->validate(Integration::$createRules, Integration::$createRulesMessages, Integration::$createRulesAttributes);

        $updateIntegration = DB::table('tblintegrations')
            ->where('id', $id)
            ->update([
                'NAME'   => $inputs['NAME'],
                'TITLE'  => $inputs['TITLE'],
                'DATE01' => $inputs['DATE01'],
                'DATE02' => $inputs['DATE02'],
                'INT01'  => $inputs['INT01'],
                'VAL01'  => $inputs['VAL01']
            ]);

        if($updateIntegration) {
            return redirect('/integration')->with('success', 'Интеграция ўзгартирилди!');
        }
        return redirect()->back()->with('error', 'Ўзгартиришда хатолик!')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}