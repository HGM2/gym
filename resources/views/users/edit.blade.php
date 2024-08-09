<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="membership_id">Membresía</label>
                        <select name="membership_id" id="membership_id" class="form-control">
                            <option value="">Seleccionar Membresía</option>
                            @foreach($memberships as $membership)
                                <option value="{{ $membership->id }}" {{ $user->membership_id == $membership->id ? 'selected' : '' }}>{{ $membership->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="photo">Foto</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                        @if ($user->photo_path)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $user->photo_path) }}" alt="Foto de {{ $user->name }}" class="img-thumbnail" width="100">
                            </div>
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
