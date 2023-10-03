<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;
use Illuminate\View\View;
use App\Models\Category;


class BookController extends Controller
{

    public function index(): View
    {
        $books = Book::all();
        return view ('books.index')->with('books', $books);
    }

 
    public function create(): View
    {
        return view('books.create');
    }

  
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'isbn' => 'required|max:13',
            'title' => 'required|max:255',
            'author' => 'required|max:50',
            'price' => 'required',
            'categoryid' => 'required',
        ]);

        Book::create($validatedData);

        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }

    public function show(string $isbn): View
    {
        $book = Book::find($isbn);
        return view('books.show')->with('books', $book);
    }

    public function edit($isbn)
    {
        $book = Book::where('isbn', $isbn)->first(); // Saya asumsikan Anda juga memiliki model Book.

        $categories = Category::all(); // Mengambil semua kategori.

        return view('books.edit', compact('book', 'categories'));
    }


    public function update(Request $request, string $isbn): RedirectResponse
    {
        $book = Book::find($isbn);
        $input = $request->all();
        $book->update($input);
        return redirect('books')->with('flash_message', 'book Updated!');  
    }
    
    public function destroy(string $isbn): \Illuminate\Http\RedirectResponse
    {
        Book::destroy($isbn);
        return redirect('books')->with('flash_message', 'book deleted!');
    }
}