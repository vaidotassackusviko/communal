<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::all();
        return view('houses.index', compact('houses'));
    }

    public function create()
    {
        return view('houses.create');
    }

    public function store(Request $request)
    {
        // Validacija
        $request->validate([
            'address' => 'required|string|max:255',
            // Čia pridėkite kitus validacijos taisykles pagal jūsų poreikius
        ]);

        // Sukurkite naują namo įrašą
        $house = new House();
        $house->address = $request->input('address');
        // Čia pridėkite kitus stulpelius pagal jūsų poreikius
        $house->save();

        return redirect()->route('houses.index')
            ->with('success', 'Namas sėkmingai sukurtas');
    }

    public function show($id)
    {
        $house = House::findOrFail($id);
        return view('houses.show', compact('house'));
    }

    public function edit($id)
    {
        $house = House::findOrFail($id);
        return view('houses.edit', compact('house'));
    }

    public function update(Request $request, $id)
    {
        // Validacija
        $request->validate([
            'address' => 'required|string|max:255',
            // Čia pridėkite kitus validacijos taisykles pagal jūsų poreikius
        ]);

        // Atnaujinkite namo įrašą
        $house = House::findOrFail($id);
        $house->address = $request->input('address');
        // Čia pridėkite kitus stulpelius pagal jūsų poreikius
        $house->save();

        return redirect()->route('houses.index')
            ->with('success', 'Namo informacija sėkmingai atnaujinta');
    }

    public function destroy($id)
    {
        // Ištrinkite namą
        $house = House::findOrFail($id);
        $house->delete();

        return redirect()->route('houses.index')
            ->with('success', 'Namas sėkmingai ištrintas');
    }
}
