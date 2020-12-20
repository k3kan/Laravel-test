<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = DB::table('authors')->paginate(15);
        $books = DB::table('books')->paginate(15);
        return view('authors.author', ['authors' => $authors, 'books' => $books]);
    }

    public function search(Request $request)
    {
        $requestAuthor = $request->input('author');
        $requestBook = $request->input('book');
        $requestAuthor ? $author = DB::table('authors')->where('name', $requestAuthor)->get() : $author = null;
        $requestBook ? $book = DB::table('books')->where('name', $requestBook)->get() : $book = null;
        $databaseBooks = DB::table('books');
        $databaseAuthors = DB::table('authors');
        return view('search', ['author' => $author, 'databaseAuthors' => $databaseAuthors, 'databaseBooks' => $databaseBooks, 'book' => $book]);
    }

    public function create()
    {
        $authors = new Author();

        return view('authors.create', ['authors' => $authors]);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:authors',
            'dateOfBirth' => 'required',
        ]);
        $author = new Author();
        $author->name = $request->input('name');
        $author->dateOfBirth = $request->input('dateOfBirth');
        $author->dateOfDeath = $request->input('dateOfDeath');
        $author->save();

        return redirect('authors');
    }

    public function show($id)
    {
        $author = DB::table('authors')->find($id);

        return view('authors.show', ['author' => $author]);
    }

    public function edit($id)
    {
        $author = DB::table('authors')->find($id);

        return view('authors.edit', ['author' => $author]);
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:authors,name,',
            'dateOfBirth' => 'required',
        ]);
        $author = DB::table('authors')->where('id', $id)
            ->update(['name' => $request->input('name'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            'dateOfDeath' => $request->input('dateOfDeath')]);
        return redirect('authors');
    }

    public function delete($id)
    {
        $author = DB::table('authors')
            ->where('id', $id)
            ->delete();
        return redirect('authors');
    }

}
