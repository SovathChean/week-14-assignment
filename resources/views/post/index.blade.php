@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  Post
                  <div  style="float: right">
                    <a href="{{route('post.create')}}" class="btn btn-primary" > Add Post </a>
                  </div>
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                      <table id="datatable" class="table table-striped table-bordered" >
                          <thead>
                            <tr>
                            <th>#</th>
                            <th>Post</th>
                            <th>Author</th>
                            <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                             @foreach($posts as $post)
                             <tr id="post-{{ $post->id }}">
                                 <td>{{$post->id}}</td>
                                 <td>{{$post->name}}</td>
                                 <td>{{$post->user->name}}</td>

                                 <td>

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

                                   {!! Form::open(['method'=>'GET', 'action'=>['PostController@show', $post->id], 'style'=>'display: inline-block']) !!}
                                   {!! Form::submit('Show', ['class'=>'btn btn-outline-primary']) !!}
                                   {!! Form::close() !!}


                                 </td>

                             </tr>
                              @endforeach
                          </tbody>
                      </table>
                      <div class="pagination justify-content-center">
                        {{ $posts->links() }}
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
