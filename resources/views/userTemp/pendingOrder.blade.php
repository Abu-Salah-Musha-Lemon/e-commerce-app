@extends('userTemp.layout.user')

@section('userProfile')


<div class="container-fluid">
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Quantity</th>
          <th scope="col">Product Price</th>
        </tr>
      </thead>
      <tbody>
        @php
        $s = 1;
        $product_names = App\Models\Product::pluck('product_name', 'id'); // Get product names keyed by their IDs



        @endphp


        @foreach($orderItems as $product)
        <tr>
          <td>{{ $s++ }}</td>
          <td>{{ $product_names[$product->ProductId] ?? 'Unknown' }}</td> <!-- Get product name by product_id -->
          <td>{{ $product->ProductQty }}</td>
          <td>{{ $product->ProductPrice }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection