<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use PDF;

class PayrollController extends Controller
{
    public function create()
    {
        $employees = Employee::all();
        return view('payrolls.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $employee = Employee::find($request->employee_id);
        $hours_worked = $request->hours_worked;
        $deductions = $request->deductions;
        $shift = $request->shift;

        $total_salary = $employee->salary * $hours_worked;

        // Lógica para deducciones
        if ($deductions == 'tax') {
            $total_salary -= $total_salary * 0.15; // Ejemplo: 15% de impuesto
        } elseif ($deductions == 'seguro') {
            $total_salary -= 100; // Ejemplo: 100 unidades de seguro
        } elseif ($deductions == 'ISR') {
            $total_salary -= 50; // Ejemplo: 50 unidades de otras deducciones
        }

        $data = [
            'employee' => $employee,
            'hours_worked' => $hours_worked,
            'deductions' => $deductions,
            'shift' => $shift,
            'total_salary' => $total_salary
        ];

        $pdf = PDF::loadView('payrolls.pdf', $data);
        return $pdf->download('nomina.pdf');
    }
}
