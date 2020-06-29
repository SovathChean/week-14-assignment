@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  Category
                  @can('createCategory', App\Models\Category::class)
                  <div  style="float: right">
                    <a href="{{route('category.create')}}" class="btn btn-primary" > Add Category</a>
                  </div>
                  @endcan
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                     @include('category.includes.table')
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
