<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::withCount('books')->get();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

 public function store(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        // No validamos 'bio' porque no existe en la tabla
    ]);

    // Solo enviamos los campos que sí existen en la base de datos
    Author::create([
        'first_name' => $validated['first_name'],
        'last_name'  => $validated['last_name'],
    ]);

    return redirect()->route('authors.index')->with('success', 'Autor creado correctamente.');
}
    public function show(Author $author)
    {
        $author->load('books');
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
    }

    public function destroy(Author $author)
    {
    }
}