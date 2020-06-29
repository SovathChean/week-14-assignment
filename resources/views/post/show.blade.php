@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Post</div>

                <div class="card-body">
                  {{$post->name}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
