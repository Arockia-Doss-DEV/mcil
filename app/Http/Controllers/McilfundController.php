<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\McilFund;

class McilfundController extends Controller
{
    public function index(Request $request)
    {
        $q =  $request->input('q');
        if($q!=""){
            $mcilFund = McilFund::where('name','LIKE','%'.$q.'%')->get();
        }else{
            $mcilFund = McilFund::all();
        }

        return view('admin.mcilfund.index', compact('mcilFund'));
    }
    
    public function setDefaultFund(Request $request)
    {
        $id = $request->input('id');
        if ($id == 0) {
            
            McilFund::where('active', 1)
               ->update([
                   'setdefault' => 0
                ]);

        } else {
            $mcilFund = McilFund::where('active', 1)->update(['setdefault' => 0]);
            McilFund::where(['id' => $id, 'active' => 1])->update(['setdefault' => 1]);
        }
    }

    public function saveFund(Request $request)
    {
        $requestData = $request->all();
        $requestData['company_name'] = strtoupper($request->get('name'));

        $active_status = $request->get('active');
        if ($active_status == 1) {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }

        $fund = McilFund::create($requestData);

        if ($fund) {
            return response()->json(['data' => $fund, 'error' => true, 'msg' => "The Fund has been saved"], 200);
        }
        return response()->json(['data' => "null", 'error' => false, 'msg' => "The Fund could not be saved. Please, try again."], 200);
    }

    public function getFund(Request $request)
    {
        $id = $request->get('id');
        $fund = McilFund::findOrFail($id);

        if($fund){
            return response()->json(['data' => $fund, 'error' => true, 'msg' => "The Fund data retrieve successfully"], 200);
        }

        return response()->json(['data' => 'null', 'error' => false,'msg' => "The Fund data could not be retrieve. Please, try again."], 200);
    }

    public function updateFund(Request $request)
    {   
        $requestData = $request->all();

        $id = $request->get('id');
        $mcilFund = McilFund::find($id);

        $requestData['company_name'] = strtoupper($request->get('name'));

        $active_status = $request->get('active');
        if ($active_status == 1) {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }

        $fund = $mcilFund->update($requestData);

        if ($fund) {
            return response()->json(['data' => $fund, 'error' => true, 'msg' => "The Fund has been updated"], 200);
        }
        return response()->json(['data' => "null", 'error' => false, 'msg' => "The Fund could not be updated. Please, try again."], 200);
    }
}
