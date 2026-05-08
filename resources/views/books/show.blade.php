@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 mt-10">
    <div class="md:flex">
        <div class="md:shrink-0 bg-gray-100 flex items-center justify-center p-10">
            <span class="text-8xl">📖</span>
        </div>
        <div class="p-8 w-full">
            <div class="flex justify-between items-start">
                <x-category-badge :category="$book->category" />
                <x-book-status-badge :status="$book->status" />
            </div>
            
            <h1 class="block mt-4 text-3xl font-bold text-gray-900 leading-tight">
                {{ $book->title }}
            </h1>
            
            <div class="mt-4 border-t border-b border-gray-100 py-4">
                <p class="text-gray-600"><strong>Autor(es):</strong> 
                    {{-- Recorremos la relación authors en plural --}}
                    @forelse($book->authors as $author)
                        <a href="{{ route('authors.show', $author) }}" class="text-blue-600 hover:underline">
                            {{ $author->name }}
                        </a>@if(!$loop->last), @endif
                    @empty
                        <span class="text-gray-400">Sin autor registrado</span>
                    @endforelse
                </p>
                {{-- Ajustado a publish_year según tu modelo --}}
                <p class="text-gray-600"><strong>Año:</strong> {{ $book->publish_year ?? 'N/A' }}</p>
                <p class="text-gray-600"><strong>ISBN:</strong> {{ $book->isbn }}</p>
            </div>

            <div class="mt-6">
                <h3 class="font-semibold text-gray-800 mb-2">Descripción / Resumen</h3>
                <p class="text-gray-500 italic">
                    {{ $book->description ?? 'Sin descripción disponible para este ejemplar.' }}
                </p>
            </div>

            <div class="mt-8 flex gap-4">
                <a href="{{ route('books.index') }}" class="text-gray-500 hover:text-gray-700 font-medium">
                    ← Volver al catálogo
                </a>
            </div>
        </div>
    </div>
</div>
@stop