@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Nómina</h1>
    <form action="{{ route('payrolls.update', $payroll->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="employee_id">Empleado</label>
            <select class="form-control" id="employee_id" name="employee_id" required>
                @foreach($employees as $employee)
                <option value="{{ $employee->id }}" {{ $payroll->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }} {{ $employee->surname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="hours_worked">Horas Trabajadas</label>
            <input type="number" class="form-control" id="hours_worked" name="hours_worked" step="0.01" value="{{ $payroll->hours_worked }}" required>
        </div>
        <div class="form-group">
            <label for="deductions">Deducciones</label>
            <select class="form-control" id="deductions" name="deductions">
                <option value="0" {{ $payroll->deductions == 0 ? 'selected' : '' }}>Ninguna</option>
                <option value="10" {{ $payroll->deductions == 10 ? 'selected' : '' }}>Impuestos</option>
                <option value="20" {{ $payroll->deductions == 20 ? 'selected' : '' }}>Seguro</option>
                <option value="30" {{ $payroll->deductions == 30 ? 'selected' : '' }}>Otros</option>
            </select>
        </div>
        <div class="form-group">
            <label for="shift">Turno</label>
            <input type="text" class="form-control" id="shift" name="shift" value="{{ $payroll->shift }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
