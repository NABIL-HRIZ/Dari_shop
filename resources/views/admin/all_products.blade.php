<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dari Shop Admin</title>
    <!-- plugin:css -->
    <link rel="stylesheet" href="adminDashboard/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="adminDashboard/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="adminDashboard/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="adminDashboard/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="adminDashboard/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="adminDashboard/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="adminDashboard/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="adminDashboard/assets/images/favicon.png" />
  </head>
  <body>
  
    @include('sweetalert::alert')

    <div class="container-scroller">
     
      <!-- partial:partials/_sidebar.html -->
     

      @include('admin.sidebar')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       

        @include('admin.navbar')
        <!-- partial -->

        <div class="p-4" style="margin-top:60px">
            <h1 style="font-size: 40px;font-weight:bold;letter-spacing:2px">ALL PRODUCTS</h1>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                
                @foreach ($products as $product)
                    
                <div class="col mt-5" style="background-color:rgba(0,0,0,0.5)">
                  <div class="card h-100">
                    <img src="{{'ProductImage/'.$product->image}}" class="card-img-top" style="width: 200px;height:100px;margin-left:40px" alt="product Image ">
                    <div class="card-body">
                      <h2 class="card-title" style="font-size: 20px">Title : <span style="color: rgb(145, 145, 184)">{{$product->title}}</span></h2>
                      <p class="card-text" style="font-size15px">{{$product->description}}</p>
                      <h3 style="font-size:18px;margin-top:10px"><span style="color:greenyellow">Category : {{$product->category}}</span></h3>
                      <h4 style="font-size: 17px">Quantity : {{$product->quantity}}</h4>
                      <h5 style="font-size: 18px"><span style="color:rgb(186, 218, 192)">Price :{{$product->price}} MAD</span></h5>
                      <h6 style="font-size: 18px"><span style="color:rgb(224, 216, 187)">Discount Price :{{$product->discount_price}} %</span></h5>

                        <div class="mt-4">
                            <a href="{{url('update_product',$product->id)}}" class="btn btn-primary">Update</a>
                            <a href="{{url('delete_product',$product->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                        </div>

                    </div>
                   
                  </div>
                </div>

                @endforeach

              </div>
            

        </div>
      
       
        
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->


    <script type="text/javascript">

     function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect=ev.currentTarget.getAttribute('href');

        swal({
            title:"Are You Sure Want To Delete This Product ? ",
            text : "You Won't be Abble to See It Again !!",
            icon:'warning',
            buttons:true,
            dangerMode:true
        }).then((willCancel)=>{
            if(willCancel){
                window.location.href=urlToRedirect;
            }
        })
     }

    </script>













   @include('admin.script')
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>