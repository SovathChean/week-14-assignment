@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Post</div>
                <div class="card-body">
                   {{$post->title}}
                </div>
                <div class="p-3">
                       <h4>Comments:</h4>

                      @forelse($post->comments as $comment)
                      <div class="row">
                          <div class="col-lg-1"><i class="fa fa-user-circle fa-3x" aria-hidden="true"></i></div>
                          <div class="col-lg-9">
                              <h5>{{ $comment->name }}</h5>
                              <p>{{ $comment->comment }}</p>
                           </div>
                           <div class="col-lg-2"><small>{{ $comment->created_at->diffForHumans() }}</small></div>
                       </div>
                       <hr class="p-0 m-0 pt-2"/>
                       @empty
                       <div class="row">
                           <p class="col-lg-11">No comment yet</p>
                       </div>
                       <hr class="p-0 m-0 pt-2"/>
                       @endforelse

                       <h5>Create new comment:</h5>
                       @include('comment.create')
                   </div>
            </div>
        </div>
    </div>
</div>
@endsection
