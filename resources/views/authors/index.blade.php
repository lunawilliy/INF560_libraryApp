@extends('layouts.app')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-white">Autores Registrados</h1>
    <a href="{{ route('authors.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-green-500 transition">
        + Añadir Autor
    </a>
</div>

<div class="bg-gray-800 shadow-md rounded-lg overflow-hidden border border-gray-700">
    <table class="min-w-full divide-y divide-gray-700">
        <thead class="bg-gray-900">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Nombre Completo</th>
                {{-- Nota: Si no tienes columna nationality, la dejamos como 'Información' o puedes quitarla --}}
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Biografía</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Libros</th>
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody class="bg-gray-800 divide-y divide-gray-700">
            @forelse($authors as $author)
            <tr class="hover:bg-gray-700 transition">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                    {{-- Unimos los dos campos que PostgreSQL sí reconoce --}}
                    {{ $author->first_name }} {{ $author->last_name }}
                </td>
                <td class="px-6 py-4 text-sm text-gray-400">
                    {{-- Limitamos el texto de la bio para que no deforme la tabla --}}
                    {{ Str::limit($author->bio ?? 'Sin biografía registrada', 50) }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                    {{-- Mostramos el conteo de la relación books --}}
                    <span class="bg-blue-900 text-blue-200 px-2 py-1 rounded-full text-xs">
                        {{ $author->books->count() }} libros
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('authors.show', $author) }}" class="text-blue-400 hover:text-blue-300">Ver perfil →</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-10 text-center text-gray-500 italic">
                    No hay autores registrados actualmente.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@stop