<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $authors = DB::table('authors')->paginate(15);
        $books = DB::table('books')->paginate(15);
        return view('books.book', ['authors' => $authors, 'books' => $books]);
    }

    public function create()
    {
        $books = new Book();

        return view('books.create', ['books' => $books]);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'yearOfPublishing' => 'required',
            'content' => 'required',
            'authorName' => 'required'
        ]);
        $book = new Book();
        $book->name = $request->input('name');
        $book->yearOfPublishing = $request->input('yearOfPublishing');
        $book->content = $request->input('content');
        $author = $request->input('authorName');
        $checkTerms = DB::table('authors')->where('name', $author)->get();
        if (isset($checkTerms)) {
           foreach ($checkTerms as $needfulAuthor) {
               $book->author_id = $needfulAuthor->id;
           }
        } else {
            $createAuthor = new Author();
            $createAuthor->name = $author;
            $createAuthor->dateOfBirth = null;
            $createAuthor->save();
            $book->author_id = $createAuthor->id;

        }
        $book->save();
        return redirect('authors');
    }

    public function show($id)
    {
        $book = DB::table('books')->find($id);
        $author = DB::table('authors')->find($book->author_id);
        return view('books.show', ['book' => $book, 'author' => $author]);
    }

    public function edit($id)
    {
        $book = DB::table('books')->find($id);

        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:books,name,',
            'yearOfPublishing' => 'required',
            'content' => 'required',
        ]);
        $book = DB::table('books')->where('id', $id)
            ->update(['name' => $request->input('name'),
                'yearOfPublishing' => $request->input('yearOfPublishing'),
                'content' => $request->input('content')]);
        return redirect('books');
    }

    public function delete($id)
    {
        $book = DB::table('books')
            ->where('id', $id)
            ->delete();
        return redirect('books');
    }
}
