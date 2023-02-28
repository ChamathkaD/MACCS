<?php

namespace App\Http\Controllers\Midwife;

use App\Child;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveNewbornRequest;
use App\Newborn;
use Illuminate\Http\Request;

class NewbornController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Child $child)
    {
        return view('midwife.users.newborns.create')->with(compact('child'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SaveNewbornRequest $request, Child $child)
    {
        $newborn = Newborn::firstOrNew();
        $newborn->child_id = $child->id;
        $newborn->apgar_score = $request->input('apgar_score');
        $newborn->birth_height = $request->input('birth_height');
        $newborn->birth_hcm = $request->input('birth_hcm');
        $newborn->skin = $request->input('skin');
        $newborn->eyes = $request->input('eyes');
        $newborn->temperature = $request->input('temperature');
        $newborn->notes = $request->input('notes');
        $newborn->save();
        return redirect()->route('midwife.show.child', $child->id)->with('success', 'New Born Record Created Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Newborn $newborn)
    {
        return view('midwife.users.newborns.edit')->with(compact('newborn'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveNewbornRequest $request, Newborn $newborn)
    {
        $newborn->apgar_score = $request->input('apgar_score');
        $newborn->birth_height = $request->input('birth_height');
        $newborn->birth_hcm = $request->input('birth_hcm');
        $newborn->skin = $request->input('skin');
        $newborn->eyes = $request->input('eyes');
        $newborn->temperature = $request->input('temperature');
        $newborn->notes = $request->input('notes');
        $newborn->save();
        return redirect()->route('midwife.show.child', $newborn->child_id)->with('success', 'Newborn Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Newborn $newborn)
    {
        $newborn->delete();
        return back()->with('success', 'Newborn Health Record Deleted!');
    }
}
