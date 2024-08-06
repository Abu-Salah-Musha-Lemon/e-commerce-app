@extends('admin.layouts.layout')
@section('main')
<h4 class="fw-bold py-3 mb-4"> <span class='text-muted fw-light'>Page /</span>All Sub Category</h4>

<div class="row">
  <!-- Basic Category -->
  <div class="col-xxl">
    <div class="card mb-6">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add Sub Category</h5>

      </div>
      <div class="card-body">
      <form action="{{ route('subcategory.store') }}" method="POST">
      @csrf
          <div class="row mb-6">
            <div class="col-md-6">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('subcategory_name') @enderror" name="subcategory_name"
                  placeholder="Enter Name" value="{{old('subcategory_name')}}">
                <span class='text-danger'>@error('subcategory_name'){{ $message }}@enderror</span>
              </div>
            </div>
        
            <div class="col-md-6">
              <label class="col-sm-2 col-form-label" for="basic-default-company">Category</label>
              <div class="col-sm-10">
                <select name="category_id" id="category_id" class="form-select" aria-label="Default select example">
                    <option value="" selected>Select Category</option>
                    @foreach ($category as $items)
                        <option value="{{ $items->id }}">{{ $items->id }}. {{ $items->category_name }} </option>
                        
                    @endforeach
                </select>

                <span class='text-danger'>@error('subcategory_name'){{ $message }}@enderror</span>
              </div>
            </div>
            
          </div>

          <div class="row justify-content-center">
            <div class="col-sm-10 col-md-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>


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