@include('post.includes.errors')
{!! Form::open(['method'=>'POST', 'action'=>['PostController@store']]) !!}
<div class="form-group">
     {!! Form::label('title', 'title') !!}
     {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
     {!! Form::label('body', 'body') !!}
     {!! Form::textarea('body', null, ['class'=>'form-control', 'rows' => 4, 'cols' => 54]) !!}
</div>
<div class="form-group">
  {!! Form::label('category_id', 'Category') !!}
  {!! Form::select('category_id',[''=>'choose categories'] + $categories, null, ['class'=>'form-control','value'=> '$categories->id']) !!}
</div>
{!! Form::submit('submit', ['class'=>'btn btn-outline-info']) !!}
{!! Form::close() !!}
