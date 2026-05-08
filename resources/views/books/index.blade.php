@extends('layouts.app')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Catálogo de Libros</h1>
    <p class="text-gray-600">Explora nuestra colección actualizada.</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($books as $book)
        <x-book-card :book="$book" />
    @endforeach
</div>

<div class="mt-8 mb-12">
    {{ $books->links() }}
</div>
@stop