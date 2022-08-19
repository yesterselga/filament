<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
     <meta charset="utf-8">

     <meta name="application-name" content="{{ config('app.name') }}">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>{{ config('app.name') }}</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
     </script>
     @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased">
     <div class="container container-fluid">

          <nav class="navbar navbar-expand-lg py-3 navbar-light bg-light shadow-sm">
               <div class="container">
                    <a href="#" class="navbar-brand">
                         <!-- Logo Image -->
                         <img src="https://sih.bky.ph/eyJidWNrZXQiOiJib29reS1tZXJjaGFudC1kYXNoYm9hcmQiLCJrZXkiOiI4ZmM2YTZiOS00MjRlLTQ5MzMtOTliZi0wNGM1YjMzMzhmMmIvOHJhZmZXRXViaEhGcVBFWmdtUUtkMy5wbmciLCJlZGl0cyI6eyJyZXNpemUiOnsid2lkdGgiOjEwMCwiaGVpZ2h0IjoxMDAsImZpdCI6ImNvdmVyIn19fQ=="
                              width="45" alt="" class="d-inline-block align-middle mr-2">
                         <!-- Logo Text -->
                         <span class="font-weight-bold">Kenny Rogers Roasters</span>
                    </a>
               </div>
          </nav>

          <img src="https://sih.bky.ph/eyJidWNrZXQiOiJib29reS1tZXJjaGFudC1kYXNoYm9hcmQiLCJrZXkiOiI4ZmM2YTZiOS00MjRlLTQ5MzMtOTliZi0wNGM1YjMzMzhmMmIvdDR2clFoaUVtaE1ITGFITjRidDVNWC5qcGVnIiwiZWRpdHMiOnsicmVzaXplIjp7IndpZHRoIjoxNTAwLCJoZWlnaHQiOjcwNCwiZml0IjoiY292ZXIifX19"
               class="img-fluid" alt="...">

          <div id="navbar-category" class="scrollmenu">
               <a href="#category-chicken">Chicken</a>
               <a href="#category-pork">Pork</a>
               <a href="#category-beef">Beef</a>
               <a href="#category-pasta">Pasta</a>
               <a href="#category-veggies">Veggies</a>
               <a href="#category-drinks">Drinks</a>
               <a href="#category-dessert">Dessert</a>
               <a href="#category-coffee">Coffee</a>
               <a href="#category-group">Group Meals</a>
          </div>

          <nav class="navbar bottom-action fixed-bottom">
               <div class="container-fluid">
                    <a href="#nav-call-waiter" onclick="callWaiter()"><i class="fa fa-person"></i> Call a Waiter</a>
                    <a href="#nav-pork" onclick="request()"><i class="fa fa-utensil-spoon"></i> Request for Stuff</a>
                    <a href="#nav-beef" onclick="viewCart()"><span id="cart">(0)</span> View Cart</a>
               </div>
          </nav>

          @include('product-menu')

     </div>

     @include('modal-option')
     @include('cart')
     @include('modal-addcart')
     @include('requests')
     @include('modal-request')

     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
          integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
     </script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
     </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
     </script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
          integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

     <script>
          $(document).scroll(function(e){
               var scrollTop = $(document).scrollTop();
               if(scrollTop > 200){
                    $('#navbar-category').addClass('fixed-top');
               } else {
                    $('#navbar-category').removeClass('fixed-top');
               }
          });

          var cart = 0;

          $(document).ready(function(e){
               $('#modalOption').modal('show');
          });
       
          function selectProduct(){
               $('#modalAddToCart').modal('show');
          }
          function addToCart(){
               $('#modalAddToCart').modal('hide');
               cart = cart + 1;
               $('#cart').html('('+ cart +')');
          }
          function callWaiter(){
               $('#modalRequests').modal('show');
          }
          function request(){
               $('#modalRequest').modal('show');
          }
          function closeRequests(){
               $('#modalRequests').modal('hide');
          }
          function closeRequest(){
               $('#modalRequest').modal('hide');
          }
          function closeOptions(){
               $('#modalOption').modal('hide');
          }

          function addRequest(){
               $('#modalRequest').modal('hide');
               $('#modalRequests').modal('show');
          }

          function viewCart(){
               $('#modalCart').modal('show');
          }
          function closeCart(){
               $('#modalCart').modal('hide');
          }

          var requests = [];
          
     </script>
</body>

</html>