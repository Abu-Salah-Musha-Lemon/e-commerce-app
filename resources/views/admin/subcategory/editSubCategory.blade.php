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
              <th>Products</th>
              <th>Actions</th>
              
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr>
              <th scope="row">1</th>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>
                  <button type="button" class="btn btn-outline-primary">Edit</button>
                  <button type="button" class="btn btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-outline-danger">Delete</button>
              </td>
              
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection