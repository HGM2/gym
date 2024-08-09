<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="{{ $employee->surname }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $employee->address }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Puesto</label>
                        <input type="text" class="form-control" id="position" name="position" value="{{ $employee->position }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label">Sueldo</label>
                        <input type="number" class="form-control" id="salary" name="salary" value="{{ $employee->salary }}" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="additional_info" class="form-label">Información Adicional</label>
                        <textarea class="form-control" id="additional_info" name="additional_info">{{ $employee->additional_info }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Fotografía</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        @if ($employee->photo_path)
                            <img src="{{ asset('storage/' . $employee->photo_path) }}" alt="Fotografía de {{ $employee->name }}" class="img-thumbnail mt-2" width="150">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
