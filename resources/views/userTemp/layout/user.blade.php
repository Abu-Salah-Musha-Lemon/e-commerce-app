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
          <h1 class="fashion_taital"> USER </h1>
          <div class="fashion_section_2">

            <div class="row">
              <!-- Display the current product details -->

                <div class="col-lg-3 col-sm-3">
                  <div class="box_main">
                    <ul>
                      
                      <li><a href="{{route('userProfile')}}">Dashboard</a></li>
                      <li><a href="{{route('pendingOrder')}}">Pending Order</a></li>
                      <li><a href="{{route('userHistory')}}">History</a></li>
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