@extends('admin.layouts.layout')
@section('main')

<h4 class="fw-bold py-3 mb-4"> <span class='text-muted fw-light'>Page /</span>All Pending Order</h4>


<div class="row">
  <div class="col-xl">
    <div class="card">
      <h5 class="card-header">All Pending Order</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
        <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Customer Info</th>

                <th scope="col">Product Name</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Product Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
    @php
        $s = 1;
        // Get product names and user names keyed by their IDs
        $product_names = App\Models\Product::pluck('product_name', 'id');
        $user_names = App\Models\User::pluck('name', 'id'); // Note the correct model name 'User'
    @endphp

    @foreach($orderItems as $order)
        @if($order->Status === 'success') <!-- Ensure the attribute name matches your model's attribute -->
            <tr>
                <td>{{ $s++ }}</td>
                <td>{{ $user_names[$order->userId] ?? 'Unknown' }}</td> <!-- Get user name by user_id -->
                <td>
                    <ul>
                        <li>Phone Number - {{ $order->userPhone }}</li>
                        <li>City - {{ $order->userPresentAddress }}</li>
                        <li>Postal Code - {{ $order->userPostalCode }}</li>
                    </ul>
                </td>
                <td>{{ $product_names[$order->ProductId] ?? 'Unknown' }}</td> <!-- Get product name by product_id -->
                <td>{{ $order->ProductQty }}</td>
                <td>{{ $order->ProductPrice }}</td>
                <td>
                    <a href="#" class="btn btn-outline-success">Success</a>
                    <a href="{{ route('approveOrder', $order->id) }}" class="btn btn-outline-success">delete</a>
                </td>
            </tr>
        @endif
    @endforeach
</tbody>

        </table>
      </div>
    </div>
  </div>
</div>


@endsection