<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Membresías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <a href="{{ route('memberships.create') }}" class="btn btn-primary mb-3">Agregar Membresía</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($memberships as $membership)
                        <tr>
                            <td>{{ $membership->id }}</td>
                            <td>{{ $membership->type }}</td>
                            <td>{{ $membership->price }}</td>
                            <td>
                                <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST" style="display:inline;">
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
