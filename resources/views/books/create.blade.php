{{ Form::model($books, ['url' => route('books.store')]) }}
{{ Form::label('name', 'Название книги') }}
{{ Form::text('name') }}<br>
{{ Form::label('yearOfPublishing', 'Год публикации') }}
{{ Form::number('yearOfPublishing') }}<br>
{{ Form::label('content', 'Краткое содержание') }}
{{ Form::text('content') }}<br>
{{ Form::label('authorName', 'ФИО автора книги') }}
{{ Form::text('authorName') }}<br>
{{ Form::submit('Создать') }}
{{ Form::close() }}
