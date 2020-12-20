
<b>Книга </b>{{$book->name}}<br>
<b>Год издания</b> {{$book->yearOfPublishing}}<br>
<b>Краткое описание</b> {{$book->content}}<br>
<b>Автор</b> {{$author->name}}

{{ Form::model($book, ['url' => route('books.delete', $book->id), 'method' => 'DELETE']) }}
{{ Form::submit('Delete') }}
{{ Form::close() }}
