<?php

namespace App\Http\Controllers;

use App\Child;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ChecklistController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Child $child, Group $group)
    {
        return view('users.children.checklists.edit', [
            'group' => $group,
            'child' => $child
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Child $child)
    {
        $data = $request->all();

        // get a current group
        $group = Group::findOrFail($request->input('group'));

        // get categories & checklists related to current group
        foreach ($group->categories as $category) {
            foreach ($category->checklists as $checklist) {
                $checklistID[] = $checklist->id;
            }
        }

        if (!empty($checklistID)) {
            $child->checklists()->detach($checklistID);
        }

        if ($request->input('checklist')) {
            foreach ($data['checklist'] as $key => $item) {
                $child->checklists()->attach($item);
            }
        }

        return back();
    }

}
