<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use App\http\Requests\BookRequest;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {        $data = $request->all();

        $book = Book::create($data);

        return response()->json($book);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);
        if (!empty($book)) {
            return response()->json($book);
        } else {
            return response()->json(['Message' => 'not found books '], 404);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->update($request->all());
        $book->save();
        return response()->json(['message' => 'books updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $book = Book::find($id);
        $book->delete();
    }
}
