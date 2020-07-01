@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  Post
                  @can('createPost', App\Models\Post::class)
                  <div  style="float: right">
                    <a href="{{ route('post.create') }}" class="btn btn-primary" > Add Post </a>
                  </div>
                @endcan
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
                          @if(!is_null($user))
                              @if($user->isAdmin())
                                @include('post.includes.post_list')
                              @elseif($post->is_approved)
                                @include('post.includes.post_list')
                              @endif
                         @else
                           @if($post->is_approved)
                            @include('post.includes.post_list')
                            @endif
                         @endif

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
