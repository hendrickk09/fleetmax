<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::where('user_id', auth()->id())->get();
        return view('drivers.index', compact('drivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'license' => 'required|string|max:50|unique:drivers',
        ]);

        $driver = new Driver();
        $driver->name = $request->name;
        $driver->license = $request->license;
        $driver->user_id = auth()->user()->id;
        $driver->save();

        return redirect()->route('drivers.index')->with('success', 'Motorista cadastrado com sucesso.');
    }

    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name' => 'required',
            'cpf' => 'required|unique:drivers,cpf,' . $driver->id,
            'cnh' => 'required|unique:drivers,cnh,' . $driver->id,
            'contact' => 'required',
        ]);

        $driver->update($request->all());
        return redirect()->route('drivers.index');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index');
    }
}
