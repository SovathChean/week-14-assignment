@include('category.includes.error')
{!! Form::open(['method'=>'POST', 'action'=>['CategoryController@store']]) !!}
<div class="form-group">
     {!! Form::label('name', 'name') !!}
     {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

{!! Form::submit('submit', ['class'=>'btn btn-outline-info']) !!}
{!! Form::close() !!}
