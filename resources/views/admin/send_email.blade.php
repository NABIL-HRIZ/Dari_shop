<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
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
            <h1 style="font-size: 40px;font-weight:bold;letter-spacing:2px">SEND EMAIL TO <span style="color: rgb(147, 147, 180)">{{$data->customer_name}}</span></h1>
            <h2 style="font-size: 30px;font-weight:500;letter-spacing:2px">With Email : <span style="color: rgb(159, 159, 200)">{{$data->customer_email}}</span> </h2>
        
            <form class="row g-3 mt-4" action="{{url('send_user_email',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                  <label for="" class="form-label">Email Greeting  </label>
                  <input  type="text" class="form-control bg-black text-white" name="greeting" required>
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Email First  Line   </label>
                    <input style="bg-black text-white" type="text" class="form-control bg-black text-white" name="first_line" required>
                  </div>
                <div class="col-12">
                    <label for="" class="form-label">Email Body </label>
                    <input style="bg-black text-white" type="text" class="form-control bg-black text-white" name="body" required>
                  </div>

                  <div class="col-md-6">
                    <label for="" class="form-label">Email Button Name   </label>
                    <input style="bg-black text-white" type="text" class="form-control bg-black text-white" name="email_btn" required>
                  </div>
                  <div class="col-md-6">
                    <label for="" class="form-label">Email Url  </label>
                    <input style="bg-black text-white" type="text" class="form-control bg-black text-white" name="email_url" required>
                  </div>

                  <div class="col-12">
                    <label for="" class="form-label">Email Last Line   </label>
                    <input style="bg-black text-white" type="text" class="form-control bg-black text-white" name="last_line" required>
                  </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary" style="background-color:blue">SEND</button>
                </div>
              </form>

          

        </div>
      
       
        
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

   @include('admin.script')
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>