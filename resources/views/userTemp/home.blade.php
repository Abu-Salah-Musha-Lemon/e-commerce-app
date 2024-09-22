@extends('userTemp.layout.layout')

@section('main')
<!-- In your layout file (e.g., layout.blade.php) -->
<head>
    <!-- Other head elements -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
      .pagination {
    margin: 20px 0;
}

.pagination .page-link {
    color: #007bff;
}

.pagination .page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
}

.pagination .page-link:hover {
    color: #0056b3;
    text-decoration: none;
}

    </style>
</head>

<!-- fashion section start -->
<div class="fashion_section" style="margin-top:10px">
  <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <h1 class="fashion_taital">All Products</h1>
          <div class="fashion_section_2">
            <div class="row">

              @foreach ($products as $item)
              <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                  <h4 class="shirt_text">{{ $item->product_name }}</h4>
                  <p class="price_text">Start Price <span style="color: #262626;">$ {{ $item->product_price }}</span></p>
                  <div class="electronic_img">
                    <img src="{{ asset('products/' . $item->product_img) }}" alt="{{ $item->product_name }}">
                  </div>
                  <div class="btn_main">
                    <div class="buy_bt">
                      <form action="{{ route('addProductToCart', $item->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        <input type="submit" class="btn btn-warning" value="Buy Now">
                      </form>
                    </div>
                    <div class="seemore_bt">
                      <a href="{{ route('singleProduct', $item->id) }}">See More</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
          
          <!-- Show More Button -->
          <div class="row">
            <div class="col-12 text-center">
              {{ $products->links() }} <!-- This generates pagination links -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection