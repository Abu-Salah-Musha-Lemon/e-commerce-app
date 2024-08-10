@extends('userTemp.layout.layout')

@section('main')

@include('userTemp.model')
<div class="fashion_section" style="margin-top:10px">
  <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <h1 class="fashion_taital"> </h1>
          <div class="fashion_section_2">

            <div class="row">

              <div class="col-lg-12 col-sm-4">
                <div class="box_main">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product qty</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $sr = 1; $total = 0; @endphp
                      @foreach($items as $item )
                      <tr>
                        <th scope="row">{{ $sr++ }}</th>
                        @php
                        // Find the product associated with the current item
                        $product = $product_name->firstWhere('id', $item->product_id);
                        @endphp
                        <td>{{ $product ? $product->product_name : 'N/A' }}</td>
                        <td>{{ $item->product_quantity }}</td>
                        <td>{{ $item->product_price }}</td>
                        <td><a href="{{ route('deleteProductToCart', $item->id) }}" class="btn btn-warning">Remove</a></td>
                      </tr>
                      @php $total += $item->product_price; @endphp
                      @endforeach
                    </tbody>
                      @if($total > 0)
                    
                        <tr>
                          <td>Total Price</td>
                          <td>{{ $total }}</td>
                          <td>
                           
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              Check Out
                            </button>
                          </td>
                        </tr>
                      @endif
                  </table>
                </div> 
                
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
