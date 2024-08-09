<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Empleados') }}
        </h2>
    </x-slot>

    <div class="col-md-3">
        <a href="{{ route('payrolls.create') }}" class="btn btn-primary btn-block">
            Calcular Nómina
        </a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Agregar Empleado</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th> <!-- Añadir columna para la foto -->
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dirección</th>
                            <th>Puesto</th>
                            <th>Sueldo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>
                                @if ($employee->photo_path)
                                    <img src="{{ asset('storage/' . $employee->photo_path) }}" alt="Foto de {{ $employee->name }}" class="img-thumbnail" width="50">
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->surname }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>{{ $employee->salary }}</td>
                            
                            <td>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
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
        </div>
    </div>
</x-app-layout>
