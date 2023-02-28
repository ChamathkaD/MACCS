<?php

namespace App\Http\Controllers\Midwife;

use App\Charts\WeightChart;
use App\Child;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveImmunizationRequest;
use App\Http\Requests\SaveNewbornRequest;
use App\Http\Requests\SaveUserRequest;
use App\Immunization;
use App\Mail\UserAccountCreated;
use App\Newborn;
use App\User;
use App\Weight;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $records = User::with('children')
            ->where('midwife_id', Auth::guard('midwife')->id())
            ->get();
        return view('midwife.users.index')->with(compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('midwife.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SaveUserRequest $request)
    {
        $user = new User();
        $user->midwife_id = Auth::guard('midwife')->id();
        $user->type = $request->input('type');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->province = $request->input('province');
        $user->postal = $request->input('postal');
        $user->birthday = $request->input('birthday');
        $user->nic = $request->input('nic');
        // generating password
        $password = Str::random(8);
        $hashed_password = Hash::make($password);
        $user->password = $hashed_password;

        $user->save();

        // sending mail
        Mail::to($request->input('email'))->send(new UserAccountCreated($user, $password));

        return redirect()->back()->with('success', 'User Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(User $user)
    {
        return view('midwife.users.show')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(User $user)
    {
        return view('midwife.users.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveUserRequest $request, User $user)
    {
        $user->midwife_id = Auth::guard('midwife')->id();
        $user->type = $request->input('type');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->province = $request->input('province');
        $user->postal = $request->input('postal');
        $user->birthday = $request->input('birthday');
        $user->nic = $request->input('nic');
        $user->save();

        return redirect()->route('midwife.users.index')->with('success', 'Parent Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User Deleted!');
    }

    public function showChild(Child $child)
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

        return view('midwife.users.child', [
            'child' => $child,
            'chart' => $chart
        ]);
    }

}
