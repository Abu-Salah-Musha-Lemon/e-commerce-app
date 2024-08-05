@extends('userTemp.layout.layout')

@section('main')
<style>
  .txl {
    text-align: left;
  }
</style>
<!-- fashion section start -->
<div class="fashion_section" style="margin-top:10px">
  <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <h1 class="fashion_taital"> Product Description</h1>
          <div class="fashion_section_2">

            <div class="row">
              <!-- Display the current product details -->

              <div class="row">

                <div class="col-lg-4 col-sm-4">
                  <div class="box_main">
                    <h4 class="shirt_text">{{ $product->product_name }}</h4>
                    <div class="electronic_img">
                      <img src="{{ asset('products/' . $product->product_img) }}" alt="{{ $product->product_name }}">

                    </div>
                  </div>
                </div>

                <div class="col-lg-8 col-sm-4">
                  <div class="box_main">
                    <h4 class="shirt_text txl">{{ $product->product_name }}</h4>

                    <a href="{{ route('categoryPage', [$product->product_category_id,$product->slug]) }}">
                      <i class="bi bi-folder2-open"></i>

                      @foreach($category as $items)
                      @if($product->product_category_id === $items->id)
                      {{$items->category_name}}@endif @endforeach
                    </a> <span>&#8596;</span>

                    <a href="#">
                      <i class="bi bi-folder2-open"></i>
                    </a>


                    <p class="text txl">{{ $product->product_des }}</p>
                    <p class="price_text txl">
                      Stock : <span style="color: #262626;">{{ $product->product_quantity }}</span>
                    </p>
                    <p class="price_text txl">
                      Start Price <span style="color: #262626;">$ {{ $product->product_price }}</span>
                    </p>

                    <div class="btn_main mt-4">
                      
                      <form action="{{ route('addProductToCart', $product->id) }}" method="post">
                        @csrf
                        <label for="quantity">How many products do you want?</label>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="product_price" value="{{ $product->product_price }}">
                        
                        <input type="number" id="quantity" name="product_qty" min="1" step="1" class="form-control"
                          required><br>
                        <input type="submit" class="btn btn-warning" value="Add to Cart">
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- related section start -->
  <div class="fashion_section" style="margin-top:10px">
    <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <h1 class="fashion_taital">Related Products</h1>
            <div class="fashion_section_2">
              <div class="row">
                @if($relatedProducts->isNotEmpty())
                @foreach ($relatedProducts as $item)
                <div class="col-lg-4 col-sm-6">
                  <div class="box_main">
                    <h4 class="shirt_text">{{ $item->product_name }}</h4>
                    <p class="price_text">Start Price <span style="color: #262626;">$ {{ $item->product_price }}</span>
                    </p>
                    <div class="electronic_img">
                      <img src="{{ asset('products/' . $item->product_img) }}" alt="{{ $item->product_name }}">
                    </div>
                    <div class="btn_main">
                      <div class="buy_bt"><a href="#">Buy Now</a></div>
                      <div class="seemore_bt"><a href="{{ route('singleProduct', $item->id) }}">See More</a></div>
                    </div>
                  </div>
                </div>
                @endforeach
                @else
                <p>No related products found.</p>
                @endif
              </div>



            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  @endsection