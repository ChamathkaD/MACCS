<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveMOHRequest;
use App\MOH;
use Illuminate\Http\Request;

class MOHController extends Controller
{
    public function showMOH()
    {
        $moh = MOH::first();
        return view('admin.MOH.show')->with(compact('moh'));
    }

    public function editMOH()
    {
        $moh = MOH::first();
        return view('admin.MOH.edit')->with(compact('moh'));
    }

    public function updateMOH(SaveMOHRequest $request)
    {
        $mOH = MOH::firstOrNew();
        $mOH->division_no = $request->input('division_no');
        $mOH->division_address = $request->input('division_address');
        $mOH->sub_division_no = $request->input('sub_division_no');
        $mOH->sub_division_address = $request->input('sub_division_address');
        $mOH->save();

        return redirect()->route('admin.moh.show')->with('success', 'MOH updated Successfully!');
    }
}
