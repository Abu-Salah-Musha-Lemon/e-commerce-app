@extends('admin.layouts.layout')
@section('main')
<h4 class="fw-bold py-3 mb-4"> <span class='text-muted fw-light'>Page /</span>All Sub Category</h4>
<div class="row">
  <div class="col-xl">
  <div class="card">
      <h5 class="card-header">All Sub Category</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr class="text-nowrap">
              <th>#</th>
              <th>Category Name</th>
              <th>Sub Category Name</th>
              <th>Products Counts</th>
              <th>Actions</th>
              
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach( $subcategory as $items)
            <tr>
              <th scope="row">{{$items->id}}</th>
              <td>{{$items->category_name}}</td>
              <td>{{$items->subcategory_name}}</td>
              <td>{{$items->product_count}}</td>
              <td>
              <a href="{{ route('subcategory.edit',$items->id) }}" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
              <a href="{{ route('subcategory.destroy',$items->id) }}" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>
         
              </td>
              
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection