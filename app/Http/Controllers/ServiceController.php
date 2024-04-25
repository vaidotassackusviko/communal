<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\House;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('house')->get();
        //$services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        $houses = House::all();
        return view('services.create', compact('houses'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'house_id' => 'nullable|exists:houses,id',
        ]);

        Service::create($validatedData);

        return redirect(route('services.index'))->with('success', 'Paslauga sėkmingai sukūrė');
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);

        return view('services.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        print_r($service);
        $houses = House::all();
        return view('services.edit', compact('service', 'houses'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'house_id' => 'nullable|exists:houses,id',
        ]);

        $service = Service::findOrFail($id);
        $service->update($validatedData);

        return redirect(route('services.index'))->with('success', 'Paslauga sėkmingai atnaujinta');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect(route('services.index'))->with('success', 'Paslauga sėkmingai ištrinta');
    }

}
