<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
   

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'license' => 'required|string|max:50|unique:drivers',
        ]);

        $driver = new Driver();
        $driver->name = $request->name;
        $driver->license = $request->license;
        $driver->user_id = auth()->id(); // Corrigido para auth()->id()
        $driver->save();

        return redirect()->route('drivers.index')->with('success', 'Motorista cadastrado com sucesso.');
    }

    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name' => 'required|string|max:255',
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
