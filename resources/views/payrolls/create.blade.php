<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Procesar Nómina') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <form action="{{ route('payrolls.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="employee_id">Empleado</label>
                        <select name="employee_id" id="employee_id" class="form-control" required>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }} {{ $employee->surname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="hours_worked">Horas Trabajadas</label>
                        <input type="number" name="hours_worked" id="hours_worked" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="deductions">Deducciones</label>
                        <select name="deductions" id="deductions" class="form-control" required>
                            <option value="tax">Impuesto</option>
                            <option value="insurance">Seguro</option>
                            <option value="other">Otros</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="shift">Turno</label>
                        <input type="text" name="shift" id="shift" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Calcular y Generar Reporte en PDF</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
