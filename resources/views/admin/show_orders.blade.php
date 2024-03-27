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


        <div class="p-4 table-responsive" >
            <h1 style="font-size: 40px;font-weight:bold;letter-spacing:2px;margin-top:60px">SHOW ORDERS</h1>
            
        <form action="{{url('search_order')}}" method="GET" style="display: flex;padding-inline:300px;margin-top:50px">

            <input  type="text" class="form-control bg-black text-white" name="search_input"   placeholder="customer_name or  product_name ..."  required>
            <input type="submit" value="search" style="background-color:purple;padding-inline: 10px">
        </form>
            <table class="table mt-4" border="1">
                <thead class="table-primary">
                    <tr>
                        <th  style="font-size: 18px;color:#000">Customer Name </th>
                        <th  style="font-size: 18px;color:#000">Customer Phone </th>
                        <th  style="font-size: 18px;color:#000">Customer Email </th>
                        <th  style="font-size: 18px;color:#000">Customer Address </th>
                        <th  style="font-size: 18px;color:#000">Product_Title</th>
                        <th  style="font-size: 18px;color:#000">Product_Quantity</th>
                        <th  style="font-size: 18px;color:#000">Product_Price</th>
                        <th  style="font-size: 18px;color:#000">Payment_Status</th>
                        <th  style="font-size: 18px;color:#000">Delivery_Status</th>
                        <th  style="font-size: 18px;color:#000">Product_Image</th>
                        <th  style="font-size: 18px;color:#000;text-align:center">Delivered</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                    <tr>
                        <td style="font-size: 15px;color:#fff">{{$order->customer_name}}</td>
                        <td style="font-size: 15px;color:#fff">{{$order->customer_phone}}</td>
                        <td style="font-size: 15px;color:#fff">{{$order->customer_email}}</td>
                        <td style="font-size: 15px;color:#fff">{{$order->customer_address}}</td>

                        <td style="font-size: 15px;color:#fff">{{$order->product_title}}</td>
                        <td style="font-size: 15px;color:#fff">{{$order->product_quantity}}</td>
                        <td style="font-size: 15px;color:#fff">{{$order->product_price * $order->product_quantity}}</td>
                        <td style="font-size: 15px;color:#fff">{{$order->payment_status}}</td>
                        <td style="font-size: 15px;color:#fff">{{$order->delivery_status}}</td>
                        <td ><img src={{"ProductImage/".$order->product_image}} alt="" style="width:100px;height:100px"></td>
                         <td>
                            @if ($order->delivery_status=='In Progress')
                            <a href="{{url('delivery',$order->id)}}" onclick="confirmation(event)" class="btn btn-success">Delivery Done</a>
                            <a href="{{url('delete_order',$order->id)}}" class="btn btn-danger" onclick="confirmation_delete(event)">Remove</a>                          
                            <a href="{{url('print_order',$order->id)}}" class="btn btn-warning">Print Order </a>
                            <a href="{{url('send_email',$order->id)}}" class="btn btn-secondary">Send Email </a>
                            <a href="{{url('send_sms',$order->id)}}" class="btn btn-info">Send Sms </a>
                                

                            @else
                            <div style="display: flex;justify-content:space-between">
                                <p style="font-size: 20px;color:rgb(164, 223, 173)">Delivered ! </p>
                            <a href="{{url('print_order',$order->id)}}" class="btn btn-success">Print Order </a>
                            <a href="{{url('send_email',$order->id)}}" class="btn btn-secondary">Send Email </a>
                            <a href="{{url('send_sms',$order->id)}}" class="btn btn-info">Send Sms </a>

                            </div>
                            

                            @endif
                            

                         </td>



                    </tr>
                        
                    @empty
                    <tr>
                        <td colspan="11" style="font-size: 20px;color:#fff">No Order Selected</td>
                    </tr>
                        
                    @endforelse
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
            title:"Are You Sure The Product Delivered ? ",
            text : "",
            icon:'info',
            buttons:true,
            dangerMode:false
        }).then((willCancel)=>{
            if(willCancel){
                window.location.href=urlToRedirect;
            }
        })
     }

     function confirmation_delete(ev){
        ev.preventDefault();
        var urlToRedirect=ev.currentTarget.getAttribute('href');

        swal({
            title:"Are You Sure Wanna  Delete This Order ? ",
            text : "",
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