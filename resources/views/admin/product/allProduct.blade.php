@extends('admin.layouts.layout')
@section('main')
<h4 class="fw-bold py-3 mb-4"> <span class='text-muted fw-light'>Page /</span>Products</h4>
<div class="row">
  <div class="col-xl">
  <div class="card">
      <h5 class="card-header">All Products</h5>
      <div class="table-responsive text-nowrap">
      <table class="table">
    <thead>
        <tr class="text-nowrap">
            <th>#</th>
            <th>Product Name</th>
           
            <th>Product Price</th>
           
            <th>Product Count</th>
            <th>Product Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @foreach($products as $product)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $product->product_name }}</td>
                
                <td>${{ number_format($product->product_price, 2) }}</td>
                
                <td>{{ $product->product_quantity }}</td>
                <td>
                    @if($product->product_img)
                        <img src="{{ asset('products/' . $product->product_img) }}" alt="{{ $product->product_name }}" width="40" height="40">
                    @else
                        No product_img
                    @endif
                </td>
                
                <td>
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-secondary"><i class="bi bi-eye"></i></a>
                    <form action="{{ route('product.destroy', $product->id) }}" method="get" style="display:inline;">
                        @csrf
                        
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                    </form>
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
