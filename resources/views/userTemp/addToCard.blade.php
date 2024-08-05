@extends('userTemp.layout.layout')

@section('main')



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
                    @php $sr =1;@endphp
                    @foreach( $items as $item)
                    <tr>
                      <th scope="row">{{$sr++}}</th>
                      <td>{{$item->product_quantity}}</td>
                     
                      <td>{{$item->product_quantity}}</td>
                      <td>{{$item->product_price}}</td>
                      <td><a href="#" class="btn btn-warning">remove</a></td>
                      
                    </tr>
                    @endforeach
                  </tbody>
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