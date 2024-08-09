<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
            'photo' => 'nullable|image',
        ]);

        $employee = new Employee($request->all());

        if ($request->hasFile('photo')) {
            $employee->photo_path = $request->file('photo')->store('photos', 'public');
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Empleado creado con éxito.');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
            'photo' => 'nullable|image',
        ]);

        $employee->fill($request->all());

        if ($request->hasFile('photo')) {
            $employee->photo_path = $request->file('photo')->store('photos', 'public');
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Empleado actualizado con éxito.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado con éxito.');
    }
}
