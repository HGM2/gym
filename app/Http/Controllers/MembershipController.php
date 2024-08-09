<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        return view('memberships.index', compact('memberships'));
    }

    public function create()
    {
        return view('memberships.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Membership::create($validatedData);

        return redirect()->route('memberships.index')->with('success', 'Membresía creada con éxito.');
    }

    public function edit($id)
    {
        $membership = Membership::findOrFail($id);
        return view('memberships.edit', compact('membership'));
    }

    public function update(Request $request, $id)
    {
        $membership = Membership::findOrFail($id);

        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $membership->update($validatedData);

        return redirect()->route('memberships.index')->with('success', 'Membresía actualizada con éxito.');
    }

    public function destroy($id)
    {
        $membership = Membership::findOrFail($id);
        $membership->delete();

        return redirect()->route('memberships.index')->with('success', 'Membresía eliminada con éxito.');
    }
}
