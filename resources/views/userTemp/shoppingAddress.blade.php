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
          <h1 class="fashion_taital"> Address</h1>
          <div class="fashion_section_2">

            <div class="row">
              <!-- Display the current product details -->
              <div class="col-lg-12 col-sm-4">
                <form action="{{route('shoppingAddress')}}" method="get">

                  <div class="box_main">

                    <div class="form-control">
                      <label for="">Phone Number</label>
                      <input type="tel" name="phoneNumber" id="" class="form-control"
                        placeholder="Enter your Phone Number">


                      <label for="">Present Address (Village)</label>
                      <input type="text" name="presentAddress" id="" class="form-control"
                        placeholder="Enter your Present Address">

                      <label for="">Postal Code</label>
                      <input type="text" name="postalCode" id="" class="form-control"
                        placeholder="Enter your Postal Code">
                        
                      <input type="submit" name="shoppingAddress" id="" class="btn btn-primary m-4" value="Submit">
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  @endsection