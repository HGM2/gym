@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Nóminas</h1>
    <a href="{{ route('payrolls.create') }}" class="btn btn-primary mb-3">Procesar Nómina</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Empleado</th>
                <th>Horas Trabajadas</th>
                <th>Deducciones</th>
                <th>Turno</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payrolls as $payroll)
            <tr>
                <td>{{ $payroll->id }}</td>
                <td>{{ $payroll->employee->name }} {{ $payroll->employee->surname }}</td>
                <td>{{ $payroll->hours_worked }}</td>
                <td>{{ $payroll->deductions }}</td>
                <td>{{ $payroll->shift }}</td>
                <td>
                    <a href="{{ route('payrolls.show', $payroll->id) }}" class="btn btn-info">Generar PDF</a>
                    <a href="{{ route('payrolls.edit', $payroll->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('payrolls.destroy', $payroll->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
