<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-block">
                            Crear Usuario
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('memberships.create') }}" class="btn btn-primary btn-block">
                            Agregar Membresía
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('employees.create') }}" class="btn btn-primary btn-block">
                            Agregar Empleado
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('payrolls.create') }}" class="btn btn-primary btn-block">
                            Calcular Nómina
                        </a>
                    </div>
                    
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-block">
                            Lista de Usuarios
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary btn-block">
                            Lista de Empleados
                        </a>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <h3>Bienvenido al Dashboard</h3>
                    <!-- Otros contenidos del dashboard -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
