<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['category', 'authors'])
            ->latest()
            ->paginate(12);

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        $authors = Author::all(); 
        
        return view('books.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'isbn'         => 'required|string|unique:books,isbn',
            'publish_year' => 'required|integer|min:1000|max:'.date('Y'),
            'category_id'  => 'required|exists:categories,id',
            'author_id'    => 'required|exists:authors,id',
            'description'  => 'nullable|string',
        ]);

        $book = Book::create([
            'title'        => $validated['title'],
            'isbn'         => $validated['isbn'],
            'publish_year' => $validated['publish_year'],
            'category_id'  => $validated['category_id'],
            'description'  => $validated['description'],
            'status'       => 'available', 
        ]);

        $book->authors()->attach($validated['author_id']);

        return redirect()->route('books.index')->with('success', '¡Libro registrado correctamente!');
    }

    public function show(Book $book)
    {
        $book->load(['category', 'authors']);
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('books.edit', compact('book', 'categories', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'author_id'   => 'required|exists:authors,id',
        ]);

        $book->update($validated);
        $book->authors()->sync($validated['author_id']); 

        return redirect()->route('books.index')->with('success', 'Libro actualizado.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Libro eliminado.');
    }
}