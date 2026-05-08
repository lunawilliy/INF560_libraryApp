@props(['book'])
<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow border border-gray-200">
    <div class="p-4">
        <div class="flex justify-between items-start mb-2">
            {{-- Badge de Categoría --}}
            @if($book->category)
                <x-category-badge :category="$book->category" />
            @else
                <span class="text-xs text-gray-400 italic">Sin categoría</span>
            @endif

            {{-- Badge de Estado --}}
            <x-book-status-badge :status="$book->status ?? 'disponible'" />
        </div>
        
        <h3 class="font-bold text-lg text-gray-800 mb-1 leading-tight">{{ $book->title }}</h3>
        
        <p class="text-gray-600 text-sm mb-4">
            {{-- Importante: usamos authors->first() porque tu relación es BelongsToMany --}}
            Por: <span class="font-medium">{{ $book->authors->first()->name ?? 'Autor no registrado' }}</span>
        </p>

        <div class="flex justify-between items-center mt-4">
            <span class="text-xs text-gray-400">Publicado: {{ $book->publish_year ?? 'N/A' }}</span>
            <a href="{{ route('books.show', $book) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Ver más →</a>
        </div>
    </div>
</div>