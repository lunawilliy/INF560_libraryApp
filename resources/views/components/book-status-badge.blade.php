@props(['status'])
@php
    $colors = [
        'disponible' => 'bg-green-100 text-green-800',
        'prestado' => 'bg-red-100 text-red-800',
        'reservado' => 'bg-yellow-100 text-yellow-800'
    ];
    $colorClass = $colors[strtolower($status)] ?? 'bg-gray-100 text-gray-800';
@endphp
<span class="px-2 py-1 rounded text-xs font-medium {{ $colorClass }}">
    {{ ucfirst($status) }}
</span>