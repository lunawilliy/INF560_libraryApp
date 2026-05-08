@props(['category'])
<span class="px-2 py-1 rounded-full text-xs font-bold text-white" style="background-color: {{ $category->color ?? '#4B5563' }}">
    {{ $category->name }}
</span>