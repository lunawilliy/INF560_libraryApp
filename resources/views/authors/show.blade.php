@extends('layouts.app')

@section('content')
<div class="mb-10">
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <a href="{{ route('authors.index') }}" class="text-blue-600 hover:underline">Autores</a>
        <span class="mx-2 text-gray-400">/</span>
        <span class="text-gray-500">{{ $author->name }}</span>
    </nav>
    
    <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-200">
        <h1 class="text-4xl font-bold text-gray-900">{{ $author->name }}</h1>
        <p class="text-lg text-gray-600 mt-2">Nacionalidad: <span class="font-medium text-gray-800">{{ $author->nationality }}</span></p>
    </div>
</div>

<h2 class="text-2xl font-bold text-gray-800 mb-6">Obras en la biblioteca</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">
    @forelse($author->books as $book)
        <x-book-card :book="$book" />
    @empty
        <div class="col-span-full bg-gray-50 p-10 text-center rounded-lg border-2 border-dashed border-gray-200">
            <p class="text-gray-500">No se encontraron libros registrados para este autor.</p>
        </div>
    @endforelse
</div>
@stop