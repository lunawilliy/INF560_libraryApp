@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md mt-10">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Registrar Nuevo Libro</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">
            {{-- Título --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium">Título del Libro</label>
                <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Ej. El ingenioso hidalgo Don Quijote" required>
            </div>

            {{-- ISBN --}}
            <div>
                <label class="block text-sm font-medium">ISBN</label>
                <input type="text" name="isbn" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="978-..." required>
            </div>

            {{-- Año de Publicación --}}
            <div>
                <label class="block text-sm font-medium">Año de Publicación</label>
                <input type="number" name="publish_year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ date('Y') }}" required>
            </div>

            {{-- Selección de Categoría --}}
            <div>
                <label class="block text-sm font-medium">Categoría</label>
                <select name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-700" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Selección de Autor (Corregido para mostrar first_name y last_name) --}}
            <div>
                <label class="block text-sm font-medium">Autor Principal</label>
                <select name="author_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-700" required>
                    <option value="">Seleccione un autor</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">
                            {{ $author->first_name }} {{ $author->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-6 text-gray-700">
            <label class="block text-sm font-medium">Descripción</label>
            <textarea name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Breve resumen del contenido..."></textarea>
        </div>

        <div class="mt-8 flex justify-end gap-4">
            <a href="{{ route('books.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Cancelar</a>
            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 shadow-sm transition">
                Guardar Libro
            </button>
        </div>
    </form>
</div>
@endsection