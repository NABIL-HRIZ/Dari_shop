<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dari_Shop Admin</title>
    <!-- plugins:css -->
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
            <h1 style="color: #FFF;font-size:40px">ADD CATEGORY</h1>

            <form class="row g-3 mt-5" action="{{url('upload_category')}}" method="POST">
                @csrf

                    <div class="col-auto">
                      <input type="text" class="form-control bg-dark text-white" style="border: 1px solid blue" id="staticEmail2" placeholder="Category name ..." name="category_name" required>
                    </div>
                   
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary mb-3 p-2" style="background-color: blue">ADD </button>
                    </div>
                  </form>

            </form>

            <table class="table p-4 mt-5" border="1">

                <thead class="table-secondary">
                    <tr>
                        <th style="font-size: 20px;font-weight:bold;color:#000">All Categories</th>
                        <th style="font-size: 20px;font-weight:bold;color:#000">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td style="font-size:18px;font-weight:bold;color:#fff">{{$category->category_name}}</td>
                        <td>
                            <a href="{{url('delete_category',$category->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                        </td>
                    </tr>
                        
                    @empty
                    <tr>
                        <td>No Category Right Now </td>
                    </tr>
                        
                    @endforelse
                    <tr>

                    </tr>
                </tbody>


            </table>

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
            title:"Are You Sure Want To Delete This Category ? ",
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