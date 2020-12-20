{{ Form::model($authors, ['url' => route('authors.store')]) }}
{{ Form::label('name', 'ФИО автора') }}
{{ Form::text('name') }}<br>
{{ Form::label('dateOfBirth', 'Год рождения писателя') }}
{{ Form::number('dateOfBirth') }}<br>
{{ Form::label('dateOfDeath', 'Год смерти писателя(если есть)') }}
{{ Form::number('dateOfDeath') }}<br>
{{ Form::submit('Создать') }}
{{ Form::close() }}
