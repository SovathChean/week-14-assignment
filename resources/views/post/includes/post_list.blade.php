<tr id="post-{{ $post->id }}">
    <td>{{$post->id}}</td>
    <td>{{$post->title}}</td>
    <td>{{$post->user->name}}</td>

    <td>
       @include('post.includes.action')
      
       {!! Form::open(['method'=>'GET', 'action'=>['PostController@show', $post->id], 'style'=>'display: inline-block']) !!}
       {!! Form::submit('Show', ['class'=>'btn btn-outline-primary']) !!}
       {!! Form::close() !!}

    </td>

</tr>
