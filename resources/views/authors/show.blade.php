
    {{$author->name}}
    {{$author->dateOfBirth}}
    {{$author->dateOfDeath}}

    {{ Form::model($author, ['url' => route('authors.delete', $author->id), 'method' => 'DELETE']) }}
    {{ Form::submit('Delete') }}
    {{ Form::close() }}
