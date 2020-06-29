@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  Create Category

                </div>

                <div class="card-body">
                  <div class="table-responsive">
                     @include('category.includes.create')
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
