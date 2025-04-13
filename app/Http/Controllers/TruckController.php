<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::where('user_id', auth()->id())->get();
        return view('trucks.index', compact('trucks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'license_plate' => 'required|unique:trucks',
            'model' => 'required',
            'status' => 'required',
        ]);

        Truck::create($request->all() + ['user_id' => auth()->id()]);
        return redirect()->route('trucks.index');
    }

    public function update(Request $request, Truck $truck)
    {
        $request->validate([
            'license_plate' => 'required|unique:trucks,license_plate,' . $truck->id,
            'model' => 'required',
            'status' => 'required',
        ]);

        $truck->update($request->all());
        return redirect()->route('trucks.index');
    }

    public function destroy(Truck $truck)
    {
        $truck->delete();
        return redirect()->route('trucks.index');
    }
}
