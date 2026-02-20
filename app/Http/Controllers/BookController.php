<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = DB::table('books')->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:30',
            'isbn' => 'required|min:3|max:30',
            'author_id' => 'required',
            'category_id' => 'required',
            'description' => 'required|min:3|max:255',
            'status' => 'required',
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('books.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = (object) [
            'id' => $id,
            'title' => 'Harry Potter',
            'isbn' => '978-0-7475-3269-9',
            'author_id' => '1',
            'category_id' => '1',
            'description' => 'The boy who lived',
            'status' => 'available',
            'cover' => 'https://via.placeholder.com/300x400'
        ];
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
