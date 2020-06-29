@include('category.includes.error')
{!! Form::model($category, ['method'=>'PATCH', 'action'=>['CategoryController@update', $category->id]]) !!}
<div class="form-group">
     {!! Form::label('name', 'name') !!}
     {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
{!! Form::submit('submit', ['class'=>'btn btn-outline-info']) !!}
{!! Form::close() !!}
