@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md mt-10 text-gray-800">
    <h2 class="text-2xl font-bold mb-6">Añadir Nuevo Autor</h2>

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Nombre - Coincide con la columna first_name --}}
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nombre</label>
                <input type="text" name="first_name" class="w-full border rounded-md p-2 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Ej. Gabriel" required>
            </div>

            {{-- Apellido - Coincide con la columna last_name --}}
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Apellido</label>
                <input type="text" name="last_name" class="w-full border rounded-md p-2 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Ej. García Márquez" required>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium mb-1">Biografía / Notas</label>
            <textarea name="bio" rows="4" class="w-full border rounded-md p-2 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Breve reseña del autor..."></textarea>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('authors.index') }}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-md">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md font-bold hover:bg-blue-700 shadow-lg">
                Guardar Autor
            </button>
        </div>
    </form>
</div>
@endsection