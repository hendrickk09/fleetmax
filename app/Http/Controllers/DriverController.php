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

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'license' => 'required|string|max:50|unique:drivers',
            'cpf' => 'required|string|max:14|unique:drivers',
            'cnh' => 'required|string|max:20|unique:drivers',
            'contact' => 'required|string|max:255',
        ]);

        Driver::create($request->all() + ['user_id' => auth()->id()]);

        return redirect()->route('drivers.index')->with('success', 'Motorista cadastrado com sucesso.');
    }

    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'license' => 'required|string|max:50|unique:drivers,license,' . $driver->id,
            'cpf' => 'required|string|max:14|unique:drivers,cpf,' . $driver->id,
            'cnh' => 'required|string|max:20|unique:drivers,cnh,' . $driver->id,
            'contact' => 'required|string|max:255',
        ]);

        $driver->update($request->all());

        return redirect()->route('drivers.index')->with('success', 'Motorista atualizado com sucesso.');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'Motorista removido com sucesso.');
    }
}