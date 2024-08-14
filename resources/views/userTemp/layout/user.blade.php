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
          <h1 class="fashion_taital"> Welcome -  @php echo Auth::user()->name; @endphp </h1>
          <div class="fashion_section_2">

            <div class="row">
              <!-- Display the current product details -->

                <div class="col-lg-3 col-sm-3">
                  <div class="box_main">
                    <ul>
                      
                      <li><a href="{{route('userProfile')}}">Dashboard</a></li>
                      <li><a href="{{route('pendingOrder')}}">Pending Order</a></li>
                      <li>

                        <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <span>Log Out</span>
                      </a>
                    </form>

                    </ul>
                  </div>
                </div>

                <div class="col-lg-8 col-sm-4">
                  <div class="box_main">
                      @yield('userProfile')
                  </div>
                </div>

              </div>

          </div>
        </div>
      </div>
    </div>
  </div>




  @endsection