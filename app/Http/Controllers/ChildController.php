<?php

namespace App\Http\Controllers;

use App\Charts\WeightChart;
use App\Child;
use App\Group;
use App\Http\Requests\SaveChildRequest;
use App\Result;
use App\Weight;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChildController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('users.children.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SaveChildRequest $request)
    {
        $child = new Child();
        $child->user_id = Auth::id();
        $child->first_name = $request->input('first_name');
        $child->last_name = $request->input('last_name');
        $child->birthday = $request->input('birthday');
        $child->date_of_registration = $request->input('date_of_registration');
        $child->birth_weight = $request->input('birth_weight');
        $child->health_status = $request->input('health_status');
        $child->save();

        return redirect(url('/'))->with('Your child added successfully!');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Child $child)
    {
        if (Weight::where('child_id', $child->id)->count()) {

            $data = Weight::where('child_id', $child->id)
                ->select([
                    DB::raw('YEAR(updated_at) as year, MONTH(updated_at) as month'),
                    DB::raw('weight as weight')
                ])
                ->orderBy('updated_at', 'asc')
                ->get();


            foreach ($data as $var) {
                $dates[] = $var->year . '-' . Carbon::create()->month($var->month)->format('M');
                $weights[] = $var->weight;
            }

            $chart = new WeightChart();
            $chart->labels($dates);
            $chart->dataset('Weights (KG)', 'line', $weights)
                ->color('black')
                ->backgroundColor('#cbc1f2');
            $chart->displayLegend(true);
        } else {
            $chart = null;
        }

        return view('users.children.show', [
            'child' => $child,
            'chart' => $chart
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Child $child)
    {
        return view('users.children.edit')->with(compact('child'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveChildRequest $request, Child $child)
    {
        $child->user_id = Auth::id();
        $child->first_name = $request->input('first_name');
        $child->last_name = $request->input('last_name');
        $child->birthday = $request->input('birthday');
        $child->date_of_registration = $request->input('date_of_registration');
        $child->birth_weight = $request->input('birth_weight');
        $child->health_status = $request->input('health_status');
        $child->save();

        return redirect(url('/'))->with('Your child updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Child $child)
    {
        $child->delete();
        return back()->with('success', 'Child Deleted!');
    }

}
