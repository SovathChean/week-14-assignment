@can('ajaxApprove', $post)
@if($post->is_approved)
<div id="{{ $post->id }}" style="display: inline-block;">
 <button type="submit" class="btn btn-outline-success ajax-approve" data-change= "{{  $post->id }}" data-url="{{ route('posts.ajax_approve', $post) }}" data-id="post-{{ $post->id }}" data-approve="{{ $post->is_approved }}">Approve</button>
</div>
@else
 <div id="{{ $post->id }}"  style="display: inline-block;">
  <button type="submit" class="btn btn-outline-danger ajax-approve" data-change= "{{  $post->id }}" data-url="{{ route('posts.ajax_approve', $post) }}" data-id="post-{{ $post->id }}" data-approve="{{  $post->is_approved }}">Waiting</button>
</div>
@endif
@endcan
@can('updatePost', $post)
{!! Form::open(['method'=>'GET', 'action'=>['PostController@edit', $post->id], 'style'=>'display: inline-block']) !!}
{!! Form::submit('update', ['class'=>'btn btn-outline-info']) !!}
{!! Form::close() !!}
@endcan



@can('deletePost', $post)
{!! Form::open(['method'=>'DELETE', 'action'=>['PostController@destroy', $post->id], 'style'=>'display: inline-block']) !!}
{!! Form::submit('delete', ['class'=>'btn btn-outline-danger']) !!}
{!! Form::close() !!}
@endcan

@can('ajaxDeletePost', $post)
   <button type="submit" class="btn btn-outline-danger ajax-delete" data-url="{{ route('posts.ajax_delete', $post) }}" data-id="post-{{ $post->id }}">Ajax Delete</button>
@endcan
