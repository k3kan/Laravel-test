
@foreach ($authors as $author)
    ФИО автора <b>{{ $author->name }}</b>
    Количество книг автора: <b>{{ $books->where('author_id', $author->id)->count() }}</b>
    <br>
@endforeach

{{$books->links()}}

<style>
    .w-5{
        display: none;
    }
</style>
