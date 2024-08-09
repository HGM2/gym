<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Membresía') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <form action="{{ route('memberships.update', $membership->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="type">Tipo de Membresía</label>
                        <input type="text" class="form-control" id="type" name="type" value="{{ $membership->type }}" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $membership->price }}" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
