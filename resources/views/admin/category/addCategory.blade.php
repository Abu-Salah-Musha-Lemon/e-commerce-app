@extends('admin.layouts.layout')

@section('main')

<h4 class="fw-bold py-3 mb-4"> <span class='text-muted fw-light'>Page /</span>Add Category</h4>
<div class="row">
  <!-- Basic Category -->
  <div class="col-xxl">
    <div class="card mb-6">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add Category</h5>
       
      </div>
      <div class="card-body">
        <form action="{{route('category.store')}}" method="POST">
          @csrf
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control @error('category_name') @enderror" name="category_name"
                  placeholder="Enter Name" value="{{old('category_name')}}">
                <span class='text-danger'>@error('category_name'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
</div>



@endsection