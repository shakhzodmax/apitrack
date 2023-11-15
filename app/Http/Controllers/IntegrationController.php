<?php

namespace App\Http\Controllers;

use App\Models\Integration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Pdo\Oci8;

class IntegrationController extends Controller
{
    public function integrationGet()
    {
        $integrations = DB::connection('oracle')
            ->table('GKK.TBLDATA')
            ->select('GKK.TBLDATA.id', 'GKK.TBLDATA.name', 'GKK.TBLDATA.update_date', 'GKK.TBLDATA.val01', 'GKK.TBLDATA.int02', 'GKK.TBLLISTS.name_uz')
            ->leftJoin('GKK.TBLLISTS', 'GKK.TBLLISTS.int01', '=', 'GKK.TBLDATA.int03')
            ->where('GKK.TBLLISTS.TYPE_ID', 400)
            ->where('GKK.TBLDATA.ASTATE', 1)
            ->where('GKK.TBLDATA.TYPE_ID', 1200)
            ->where('GKK.TBLDATA.int01', 1)
            ->get();

        return view('integration.get_integration')->with('integrations', $integrations);
    }

    public function integrationPost()
    {
        $integrations = DB::connection('oracle')
            ->table('GKK.TBLDATA')
            ->select('GKK.TBLDATA.id', 'GKK.TBLDATA.name', 'GKK.TBLDATA.update_date', 'GKK.TBLDATA.val01', 'GKK.TBLDATA.int02', 'GKK.TBLLISTS.name_uz')
            ->leftJoin('GKK.TBLLISTS', 'GKK.TBLLISTS.int01', '=', 'GKK.TBLDATA.int03')
            ->where('GKK.TBLLISTS.TYPE_ID', 400)
            ->where('GKK.TBLDATA.ASTATE', 1)
            ->where('GKK.TBLDATA.TYPE_ID', 1200)
            ->where('GKK.TBLDATA.int01', 2)
            ->get();

        return view('integration.post_integration')->with('integrations', $integrations);
    }

    public function logIntegration()
    {
        $integrations = DB::connection('oracle')->table('GKK.TBLDATA')->select('id', 'name', 'val05', 'create_date', 'update_date', 'astate', 'int01')->where('TYPE_ID', 1200)->orderBy('update_date', 'desc')->get();
        return view('integration.log_integration')->with('integrations', $integrations);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periods = DB::connection('oracle')->table('GKK.TBLLISTS')->select('*')->where('ASTATE', 1)->where('TYPE_ID', 400)->get();

        return view('integration.create_integration')->with('periods', $periods);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->validate(Integration::$createRules, Integration::$createRulesMessages, Integration::$createRulesAttributes);

        $insertIntegration = DB::connection('oracle')->table('GKK.TBLDATA')->insert([
            'TYPE_ID' => 1200,
            'NAME' => $inputs['NAME'],
            'ID' => DB::connection('oracle')->getSequence()->nextValue('GKK.SQ_TBLDATA1200'),
            'INT01' => $inputs['INT01'],
            'INT02' => $inputs['INT02'],
            'VAL01' => $inputs['VAL01'],
            'INT03' => $inputs['INT03'],
            'VAL02' => $inputs['VAL02'],
            'LONG01' => $inputs['LONG01'],
            'LONG02' => $inputs['LONG02'],
            'VAL05' => session()->get('fullname'),
            'DATE05' => date('Y-m-d H:i:s')
        ]);

        $type = $inputs['INT01'];

        if ($insertIntegration) {
            if ($type == 1) {
                return redirect('/integration/typget')->with('success', 'Integratsiya qo\'shildi!');
            }
            return redirect('/integration/typpost')->with('success', 'Integratsiya qo\'shishda xatolik!');
        }
        return redirect()->back()->with('error', 'Кушишда хатолик!')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $integration = DB::connection('oracle')->table('GKK.TBLDATA')->where('id', $id)->where('type_id', 1200)->first();
        $periods = DB::connection('oracle')->table('GKK.TBLLISTS')->select('*')->where('ASTATE', 1)->where('TYPE_ID', 400)->get();

        return view('integration.edit_integration')->with('integration', $integration)->with('periods', $periods);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inputs = $request->validate(Integration::$createRules, Integration::$createRulesMessages, Integration::$createRulesAttributes);

        $updateIntegration = DB::connection('oracle')
            ->table('GKK.TBLDATA')
            ->where('TYPE_ID', 1200)
            ->where('ID', $id)
            ->update([
                'NAME' => $inputs['NAME'],
                'INT01' => $inputs['INT01'],
                'INT02' => $inputs['INT02'],
                'VAL01' => $inputs['VAL01'],
                'INT03' => $inputs['INT03'],
                'VAL02' => $inputs['VAL02'],
                'LONG01' => $inputs['LONG01'],
                'LONG02' => $inputs['LONG02'],
                'DATE05' => now()
            ]);

        $type = $inputs['INT01'];

        if ($updateIntegration) {
            if ($type == 1) {
                return redirect('/integration/typget')->with('success', 'Integratsiya yangilandi!');
            }
            return redirect('/integration/typpost')->with('success', 'Integratsiya yangilandi!');
        }
        return redirect()->back()->with('error', 'Integratsiya yangilashda xatolik!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteIntegration = DB::connection('oracle')
            ->table('GKK.TBLDATA')
            ->where('TYPE_ID', 1200)
            ->where('ID', $id)
            ->update([
                'ASTATE' => 0
            ]);

        $integration = DB::connection('oracle')->table('GKK.TBLDATA')->where('id', $id)->where('type_id', 1200)->first();
        $type = $integration->int01;

        if ($deleteIntegration) {
            if ($type == 1) {
                return redirect('/integration/typget')->with('success', 'Integratsiya o\'chirildi!');
            }
            return redirect('/integration/typpost')->with('success', 'Integratsiya o\'chirildi!');
        }
        return redirect()->back()->with('error', 'Integratsiya o\'chirishda xatolik!');
    }
}
