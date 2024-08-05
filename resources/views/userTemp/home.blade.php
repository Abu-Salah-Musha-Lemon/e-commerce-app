@extends('userTemp.layout.layout')

@section('main')

<!-- fashion section start -->
<div class="fashion_section" style="margin-top:10px">
  <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <h1 class="fashion_taital">All Products</h1>
          <div class="fashion_section_2">
            <div class="row">

              @foreach ($product as $items)
              <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text">{{$items->product_name}}</h4>
                  <p class="price_text">Start Price <span style="color: #262626;">$ {{$items->product_price}}</span></p>
                  <div class="electronic_img"> <img src="{{ asset('products/' . $items->product_img) }}"
                      alt="{{ $items->product_name }}"></div>
                  <div class="btn_main">
                    <div class="buy_bt">

                      <form action="{{ route('addProductToCart', $items->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $items->id }}">
                        <input type="submit" class="btn btn-warning" value="Buy Now">
                      </form>

                    </div>
                    <div class="seemore_bt"><a href="{{route('singleProduct',$items->id)}}">See More</a></div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection