<?php

namespace App\Http\Controllers\Midwife;

use App\Child;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveImmunizationRequest;
use App\Immunization;
use Illuminate\Http\Request;

class ImmunizationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Child $child)
    {
        return view('midwife.users.immunizations.create')->with(compact('child'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SaveImmunizationRequest $request, Child $child)
    {
        $immunization = new Immunization();
        $immunization->child_id = $child->id;
        $immunization->batch_no = $request->input('batch_no');
        $immunization->age = $request->input('age');
        $immunization->type_of_vaccine = $request->input('type_of_vaccine');
        $immunization->date_of_vaccine = $request->input('date_of_vaccine');
        $immunization->adverse_effects_following_immunization = $request->input('adverse_effects_following_immunization');
        $immunization->bcg_scare = $request->input('bcg_scare');
        $immunization->save();

        return redirect()->route('midwife.show.child', $child->id)->with('success', 'Immunization Record Created Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Immunization $immunization)
    {
        return view('midwife.users.immunizations.edit')->with(compact('immunization'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveImmunizationRequest $request, Immunization $immunization)
    {
        $immunization->batch_no = $request->input('batch_no');
        $immunization->age = $request->input('age');
        $immunization->type_of_vaccine = $request->input('type_of_vaccine');
        $immunization->date_of_vaccine = $request->input('date_of_vaccine');
        $immunization->adverse_effects_following_immunization = $request->input('adverse_effects_following_immunization');
        $immunization->bcg_scare = $request->input('bcg_scare');
        $immunization->save();

        return redirect()->route('midwife.show.child', $immunization->child_id)->with('success', 'Immunization Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Immunization $immunization)
    {
        $immunization->delete();
        return back()->with('success', 'Immunization Record Deleted!');
    }
}
