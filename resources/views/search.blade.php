{{ Form::open(['url' => 'search', 'method' => 'get'])}}
{{ Form::label('author', 'Поиск книги по автору ') }}
{{ Form::text('author') }}
{{ Form::submit('Поиск') }}
{{ Form::close() }}

{{ Form::open(['url' => 'search', 'method' => 'get'])}}
{{ Form::label('book', 'Поиск автора по книге ') }}
{{ Form::text('book') }}
{{ Form::submit('Поиск') }}
{{ Form::close() }}

@if($author)
    @foreach ($author as $object)
        <h3>Найденные книги</h3>
        <?php $needfulBooks = $databaseBooks->where('author_id', $object->id)->get() ?>
        @foreach ($needfulBooks as $needfulBook)
            {{$needfulBook->name}}
            <br>
        @endforeach
    @endforeach
@endif


@if($book)
    @foreach ($book as $object)
        <h3>Автор книги</h3>
        <?php $needfulAuthors = $databaseAuthors->where('id', $object->author_id)->get() ?>
        @foreach ($needfulAuthors as $needfulAuthor)
            {{$needfulAuthor->name}}
            <br>
        @endforeach
    @endforeach
@endif
