<?php

namespace App\Http\Controllers\Midwife;

use App\Child;
use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function edit(Child $child, Group $group)
    {
        return view('midwife.users.checklists.show', [
            'group' => $group,
            'child' => $child
        ]);
    }
}
