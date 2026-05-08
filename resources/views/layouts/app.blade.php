<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca UATF</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100"> {{-- Cambié a fondo oscuro para que combine con tus capturas --}}
    <nav class="bg-blue-700 p-4 text-white shadow-xl">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('books.index') }}" class="font-extrabold text-2xl tracking-tight">
                📚 Biblioteca <span class="text-blue-200">UATF</span>
            </a>
            
            <div class="flex items-center space-x-2">
                <a href="{{ route('books.index') }}" class="hover:bg-blue-800 px-3 py-2 rounded-md transition">Libros</a>
                <a href="{{ route('authors.index') }}" class="hover:bg-blue-800 px-3 py-2 rounded-md transition">Autores</a>
                
                {{-- Separador visual --}}
                <div class="border-l border-blue-500 h-6 mx-2"></div>

                {{-- Botones de Acción --}}
                <a href="{{ route('books.create') }}" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-sm font-bold shadow-md transition">
                    + Nuevo Libro
                </a>
                <a href="{{ route('authors.create') }}" class="bg-emerald-700 hover:bg-emerald-600 px-4 py-2 rounded-lg text-sm font-bold shadow-md transition">
                    + Nuevo Autor
                </a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-8 px-4 pb-12">
        {{-- Mensajes de éxito (opcional pero muy útil para el paso de 'store') --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>