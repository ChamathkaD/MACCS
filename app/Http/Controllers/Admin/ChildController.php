<?php

namespace App\Http\Controllers\Admin;

use App\Charts\WeightChart;
use App\Child;
use App\Http\Controllers\Controller;
use App\Weight;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChildController extends Controller
{
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
                $dates[] = $var->year . '-' . Carbon::parse($var->month)->format('M');
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

        return view('admin.midwives.children.show', [
            'child' => $child,
            'chart' => $chart
        ]);
    }
}
