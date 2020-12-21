
@foreach ($books as $book)
    Книга <b>{{ $book->name }}</b>
    <?php $author = $authors->where('id', $book->author_id) ?>
    @foreach ($author as $object)
        Автор: <b>{{ $object->name }}</b>
    @endforeach
    <br>
@endforeach

{{$books->links()}}

<style>
    .w-5{
        display: none;
    }
</style>
