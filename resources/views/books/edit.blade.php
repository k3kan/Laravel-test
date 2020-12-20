{{ Form::model($book, ['url' => route('books.update', $book->id), 'method' => 'PATCH']) }}
{{ Form::token()}}
{{ Form::label('name', 'Название книги') }}
{{ Form::text('name') }}<br>
{{ Form::label('yearOfPublishing', 'Год публикации') }}
{{ Form::number('yearOfPublishing') }}<br>
{{ Form::label('content', 'Краткое описание книги') }}
{{ Form::text('content') }}<br>
{{ Form::submit('Обновить') }}
{{ Form::close() }}
