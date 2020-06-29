<table id="datatable" class="table table-striped table-bordered" >
    <thead>
      <tr>
      <th>#</th>
      <th>Category</th>
      <th>Action</th>
      </tr>
    </thead>
    <tbody>
       @foreach($categories as $category)
       <tr id="category-{{ $category->id }}" >
           <td>{{$category->id}}</td>
           <td>{{$category->name}}</td>
           <td>
             @can('updateCategory', $category)
             {!! Form::open(['method'=>'GET', 'action'=>['CategoryController@edit', $category->id], 'style'=>'display: inline-block']) !!}
             {!! Form::submit('update', ['class'=>'btn btn-outline-info']) !!}
             {!! Form::close() !!}
            @endcan
             @can('deleteCategory', $category)
             {!! Form::open(['method'=>'DELETE', 'action'=>['CategoryController@destroy', $category->id], 'style'=>'display: inline-block']) !!}
             {!! Form::submit('delete', ['class'=>'btn btn-outline-danger']) !!}
             {!! Form::close() !!}
            @endcan
             {!! Form::open(['method'=>'GET', 'action'=>['CategoryController@show', $category->id], 'style'=>'display: inline-block']) !!}
             {!! Form::submit('Show', ['class'=>'btn btn-outline-primary']) !!}
             {!! Form::close() !!}
              @can('ajaxDeleteCategory', $category)
             <button type="submit" class="btn btn-outline-danger ajax-delete" data-url="{{ route('categories.ajax_delete', $category) }}" data-id="category-{{ $category->id }}">Ajax Delete</button>
             @endcan
           </td>


       </tr>
        @endforeach
    </tbody>
</table>
