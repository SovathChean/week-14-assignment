<div class="content">

   {!! Form::open(['method'=>'POST', 'action'=>['CommentController@store']]) !!}

        @include('comment.form')

    {!! Form::close() !!}
</div>
