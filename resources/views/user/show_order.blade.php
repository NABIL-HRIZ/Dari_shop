<!doctype html>
<html class="no-js" lang="en">

    <head>

    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>House Shop</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>



       

        <div style="margin-top: 100px">
            <div class="section-header">
                <h2>My Orders </h2>
            </div><!--/.section-header-->

            <table class="table" border="1" style="margin-top: 30px">
                <thead style="background-color: rgb(149, 121, 170);color:#fff">
                    <tr>
                        <th>Product_Title</th>
                        <th>Product_Quantity</th>
                        <th>Product_Total_Price</th>
                        <th>Payment_Status</th>
                        <th>Delivery_Status</th>
                        <th>Product_Image</th>
                        <th>Cancel_Order</th>


                    </tr>
                </thead>
                <tbody style="text-align:center">
                    @forelse ($orders as $order)
                    <tr>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->product_quantity}}</td>
                        <td>{{$order->product_price * $order->product_quantity}} MAD</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                        <img src="{{'ProductImage/'.$order->product_image}}" alt="" style="width:100px;height:100px">
                        </td>

                        <td>

                        @if ($order->delivery_status=='In Progress')
                            
                        <a href="{{url('cancel_order',$order->id)}}" onclick="confirmation(event)" style="background-color: red;padding:10px;color:#fff">Cancel</a>

                        @else
                        
                         <span>Already Cancel Or Delivred</span>
                        @endif
                    </td>

                        

                    </tr>
                        
                    @empty
                    <tr>
                        <td colspan="6" style="font-size: 18px;color:gray">No Order Selected</td>
                    </tr>
                        
                    @endforelse
                </tbody>


            </table>

            <div style="text-align:center">
                <a href="{{url('/home')}}"style="background-color:#000;padding:10px;color:#fff;width:80%;margin-bottom:20px">Back</a>
            </div>


        </div>
		
		


		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript">

            function confirmation(ev){
               ev.preventDefault();
               var urlToRedirect=ev.currentTarget.getAttribute('href');
       
               swal({
                   title:"Are You Sure Wanna Cancel This Order? ",
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
       
       
          
       
		@include('user.script')
    </body>
	
</html>