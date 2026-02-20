<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = DB::table('authors')->get();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email',
            'bio' => 'required|min:3|max:255',
            'status' => 'required',
        ]);

        DB::table('authors')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Author Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = DB::table('authors')->where('id', $id)->first();
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = DB::table('authors')->where('id', $id)->first();
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email',
            'bio' => 'required|min:3|max:255',
            'status' => 'required',
        ]);

        DB::table('authors')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Author Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('authors')->where('id', $id)->delete();
        return back()->with('success', 'Author Deleted successfully.');
    }
}
