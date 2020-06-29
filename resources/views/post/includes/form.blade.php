@include('post.includes.errors')
{!! Form::open(['method'=>'POST', 'action'=>['PostController@store']]) !!}
<div class="form-group">
     {!! Form::label('name', 'name') !!}
     {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('category_id', 'Role') !!}
  {!! Form::select('category_id',[''=>'choose categories'] + $categories, null, ['class'=>'form-control','value'=> '$categories->id']) !!}
</div>
{!! Form::submit('submit', ['class'=>'btn btn-outline-info']) !!}
{!! Form::close() !!}
