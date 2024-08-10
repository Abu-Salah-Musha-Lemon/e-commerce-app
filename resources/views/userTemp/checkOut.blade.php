@extends('userTemp.layout.layout')

@section('main')


<div class="container-fluid">
  <div class="container">
    <div class="row">

      <div class="col-lg-6">
        <div class="box_main">
          @foreach($shippingAddress as $shippingAddress)
          <p>Phone Number:{{$shippingAddress->phoneNumber}}</p>
          <p>Present Address: {{$shippingAddress->presentAddress}}</p>
          <p>Postal Code: {{$shippingAddress->postalCode}}</p>
          @endforeach
        </div>
      </div>

      <div class="col-lg-6">
        <div class="box_main">
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
                        <td>{{ $product_names[$product->product_id] ?? 'Unknown' }}</td> <!-- Get product name by product_id -->
                        <td>{{ $product->product_qty }}</td>
                        <td>{{ $product->product_price }}</td>
                    </tr>
                @endforeach
            </tbody>

          </table>
        </div>
      </div>
      <div class="col-lg-6 d-flex justify-content-between align-item-center my-2">
      <form action="" method="get">
        <button type="{{route('orderCancel')}}" class="btn btn-outline-danger shadow-none">Cancel Order</button>
      </form>
      <form action="{{route('orders')}}" method="get">
        <button type="submit" class="btn btn-outline-success shadow-none">Place Order</button>
      </form>
    </div>
    </div>

  </div>
</div>

@endsection