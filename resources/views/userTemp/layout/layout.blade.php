<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Eflyer</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="{{asset('userTemp/css/bootstrap.min.css')}}">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="{{asset('userTemp/css/style.css')}}">
   <!-- Responsive-->
   <link rel="stylesheet" href="{{asset('userTemp/css/responsive.css')}}">
   <link href="{{asset('customcssjs/bootstrap-icons.min.css')}}" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <!-- fevicon -->
   <link rel="icon" href="{{asset('userTemp/images/fevicon.png')}}" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="{{asset('userTemp/css/jquery.mCustomScrollbar.min.css')}}">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- fonts -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
   <!-- font awesome -->
   <link rel="stylesheet" type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!--  -->
   <!-- toster -->
   <link rel="stylesheet" href="{{asset('customcssjs/toster.min.css')}}" />
   <link rel="stylesheet" href="{{asset('customcssjs/bootstrap-icons.min.css')}}" />


   <!-- owl stylesheets -->
   <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
      rel="stylesheet">
   <link rel="stylesheet" href="{{asset('userTemp/css/owl.carousel.min.css')}}">
   <link rel="stylesoeet" href="{{asset('userTemp/css/owl.theme.default.min.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
</head>
@if (Route::has('login'))
   @auth
      @php
   // Retrieve the authenticated user's role
   $user = Auth::user();
   $roleId = DB::table('role_user')->where('user_id', $user->id)->value('role_id');
   $cardProductCount = DB::table('cards')->sum('product_qty');
   
   @endphp
<body>
   <!-- banner bg main start -->
   <div class="banner_bg_main">
      <!-- header top section start -->
      <div class="container">
         <div class="header_section_top">
            <div class="row">
               <div class="col-sm-12">
                  <div class="custom_menu">
                     <ul>
                        <li><a href="{{ route('home') }}">Gift Ideas</a></li>
                        <li><a href="{{ route('newRelease') }}">New Releases</a></li>
                        @if ($roleId == 2)
                        <li><a href="{{ route('todaysDeal') }}">Today's Deals</a></li>
                        @endif
                     </ul>
                  </div>
               </div>
            </div>

         </div>
      </div>

      <!-- header top section start -->
      <!-- logo section start -->
      <div class="logo_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="logo"><a href="{{route('home')}}"><img src="{{asset('userTemp/images/logo.png')}}"></a></div>
               </div>
            </div>
         </div>
      </div>
      <!-- logo section end -->
      <!-- header section start -->
      <div class="header_section">
         <div class="container">
            <div class="containt_main">
               <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="{{route('home')}}">Home</a>
                  @php
                  $category = App\Models\category::latest()->get();
                  @endphp
                  @foreach ($category as $items)
                  <a href="{{route('categoryPage',[$items->id,$items->slug])}}">{{$items->category_name}}</a>
                  @endforeach
               </div>
               <span class="toggle_icon" onclick="openNav()"><img
                     src="{{asset('userTemp/images/toggle-icon.png')}}"></span>
               <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     @foreach ($category as $items)
                     <a class="dropdown-item"
                        href="{{route('categoryPage',[$items->id,$items->slug])}}">{{$items->category_name}}</a>
                     @endforeach
                  </div>
               </div>

               <div class="main">
                  <!-- Another variation with a button -->
                  <div class="input-group">
                     <input type="text" class="form-control" placeholder="Search this blog">
                     <div class="input-group-append">
                        <button class="btn btn-secondary" type="button"
                           style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                        </button>
                     </div>
                  </div>
               </div>
               <div class="header_box">
                  <div class="login_menu">
                     <ul>
                     @if ($roleId == 2)
                        <li>
                           <a href="{{route('addToCart')}}">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10 position-relative">Cart 
                                 <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">
                                    {{$cardProductCount}} </span>
                              </span>
                           </a>
                        </li>

                       @endif

                        @if ($roleId == 1)
                        <li><a href="{{ route('adminDashboard') }}" class="text-white"><i class="fa fa-user" aria-hidden="true"></i> {{ $user->name }}</a></li>
                        @elseif ($roleId == 2)
                        <li>
                           <a href="{{ route('userProfile') }}" class="text-white">
                              <i class="fa fa-user" aria-hidden="true"></i> {{ $user->name }}
                           </a>
                        </li>
                        @endif
                        @else
                        <li><a href="{{ route('login') }}" class="text-white">Log in</a></li>

                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="text-white">Register</a></li>
                        @endif
                        @endauth
                        @endif
                     </ul>
                  </div>
               </div>

            </div>
         </div>
      </div>
      <!-- header section end -->
      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <div class="container">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-12">
                           <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                           <div class="buynow_bt"><a href="{{route('home')}}">Buy Now</a></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-12">
                           <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                           <div class="buynow_bt"><a href="{{route('home')}}">Buy Now</a></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-12">
                           <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                           <div class="buynow_bt"><a href="{{route('home')}}">Buy Now</a></div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
      <!-- banner section end -->
   </div>
   <!-- banner bg main end -->


   @yield('main')





   <!-- footer section start -->
   <div class="footer_section layout_padding">
      <div class="container">
         <div class="footer_logo"><a href="{{route('home')}}"><img
                  src="{{asset('userTemp/images/footer-logo.png')}}"></a>
         </div>
         <div class="footer_menu">
            <ul>
               <li><a href="{{ route('home') }}">Gift Ideas</a></li>
               <li><a href="{{ route('newRelease') }}">New Releases</a></li>
               <li><a href="{{ route('todaysDeal') }}">Today's Deals</a></li>
            </ul>
         </div>
         <div class="location_main">Help Line Number : <a href="#">+1 1800 1200 1200</a></div>
      </div>
   </div>

   <!-- footer section end -->
   <!-- copyright section start -->
   <div class="copyright_section">
      <div class="container">
         <p class="copyright_text">© @php echo date('Y')@endphp All Rights Reserved. Develope by <a href="#">Abu Salah
               Musha Lemon</a></p>
      </div>
   </div>
   <!-- copyright section end -->
   <!-- Javascript files-->
   <script src="{{asset('userTemp/js/jquery.min.js')}}"></script>
   <script src="{{asset('userTemp/js/popper.min.js')}}"></script>
   <script src="{{asset('userTemp/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('userTemp/js/jquery-3.0.0.min.js')}}"></script>
   <script src="{{asset('userTemp/js/plugin.js')}}"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

   <!-- sidebar -->
   <script src="{{asset('userTemp/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
   <script src="{{asset('userTemp/js/custom.js')}}"></script>

   <script>
      function openNav() {
         document.getElementById("mySidenav").style.width = "250px";
      }

      function closeNav() {
         document.getElementById("mySidenav").style.width = "0";
      }
   </script>

   <!-- /* Toastr Notifications */ -->
   <script src="{{asset('customcssjs/toster.min.js')}}"></script>
   <script>
      /* Toastr Notifications */
      $(document).ready(function () {
         @if (Session:: has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch (type) {
         case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
         case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
         case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
         case 'danger':
            toastr.warning("{{ Session::get('message') }}");
            break;
         case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
      }
      @endif
            });
   </script>

</body>

</html>