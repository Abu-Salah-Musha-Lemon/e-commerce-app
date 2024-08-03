@extends('userTemp.layout.layout')

@section('main')


<div class="fashion_section" style="margin-top:10px">
  <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <h1 class="fashion_taital">{{$subcategory->subcategory_name}}- ({{$subcategory->product_count}})</h1>
          <div class="fashion_section_2">
            <div class="row">

       @foreach ($product as $items)
       <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text">{{$items->product_name}}</h4>
                  <p class="price_text">Start Price <span style="color: #262626;">$ {{$items->product_price}}</span></p>
                  <div class="electronic_img"><img src="{{asset('userTemp/images/laptop-img.png')}}"></div>
                  <div class="btn_main">
                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                    <div class="seemore_bt"><a href="#">See More</a></div>
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