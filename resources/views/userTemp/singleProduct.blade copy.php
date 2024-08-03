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
              @foreach ($product as $items)
              <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text">{{ $items->product_name }}</h4>
                  <div class="electronic_img">
                    <img src="{{ asset('products/' . $items->product_img) }}" alt="{{ $items->product_name }}">

                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text txl">{{ $items->product_name }}</h4>
                  @foreach ($category as $category_id)
                  @if($category_id->id===$items->product_category_id)
                  <a href="{{ route('categoryPage', [$items->product_category_id,$items->slug]) }}">
                    <i class="bi bi-folder2-open"></i> {{ $category_id->category_name }}
                  </a> <span>&#8596;</span>
                  @endif

                  @endforeach

                  @foreach ($subcategory as $subcategory_id)
                  @if($subcategory_id->id===$items->product_subcategory_id)
                  <a href="#">
                    <i class="bi bi-folder2-open"></i> {{ $subcategory_id->subcategory_name }}
                  </a>
                  @endif

                  @endforeach

                  <p class="text txl">{{ $items->product_des }}</p>
                  <p class="price_text txl">
                    Stock : <span style="color: #262626;">{{ $items->product_quantity }}</span>
                  </p>
                  <p class="price_text txl">
                    Start Price <span style="color: #262626;">$ {{ $items->product_price }}</span>
                  </p>

                  <div class="btn_main mt-4">
                    <div class="btn btn-warning"><a href="#">Add to Card</a></div>
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


<!-- related section start -->
<div class="fashion_section" style="margin-top:10px">
  <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <h1 class="fashion_taital">Related Products</h1>
          <div class="fashion_section_2">
          <div class="row">
    @if($subcategory_id->id === $relatedProduct->product_subcategory_id)
        @foreach ($product as $items)
            <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                    <h4 class="shirt_text">{{ $items->product_name }}</h4>
                    <p class="price_text">Start Price <span style="color: #262626;">$ {{ $items->product_price }}</span></p>
                    <div class="electronic_img">
                        <img src="{{ asset('userTemp/images/laptop-img.png') }}" alt="{{ $items->product_name }}">
                    </div>
                    <div class="btn_main">
                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                        <div class="seemore_bt"><a href="{{ route('singleProduct', $items->id) }}">See More</a></div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>



          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection