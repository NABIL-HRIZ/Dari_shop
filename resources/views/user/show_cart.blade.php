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


        @if (session()->has('success'))

        <div style="margin-top: 100px" class="alert alert-success">
            {{session()->get('success')}}
            <button class="close">X</button>
        </div>
            
        @endif

        <div style="margin-top: 100px">
            <div class="section-header">
                <h2>My Cart </h2>
            </div><!--/.section-header-->

            <table class="table" border="1" style="margin-top: 20px;border:2px solid blue">

                <thead style="background-color: blue ;color:#fff">
                    <tr>
                      
                        <th>Product Title </th>
                        <th>Product Quantity </th>
                        <th>Product Price </th>
                        <th>Product Image </th>
                        <th>Action </th>

                    </tr>
                </thead>
                <tbody>
                    <?php $totalPrice=0;    ?>
                    @forelse ($carts as $cart)
                    <tr>
                        <td  style="color: #000;align-items:center">{{$cart->product_title}}</td>
                        <td  style="color: #000">{{$cart->product_quantity}}</td>
                        <td  style="color: #000">{{$cart->product_price * $cart->product_quantity}} MAD </td>
                        <td><img src="{{'ProductImage/'.$cart->product_image}}" alt="Product Image" style="width:80px;height:80px"></td>
                        <td>
                            <a href="{{url('remove_product',$cart->id)}}" onclick="confirmation(event)" style="background-color: red;padding:10px;color:#fff">Remove</a>
                        </td>

                    </tr>
                    <?php $totalPrice+=$cart->product_price * $cart->product_quantity; ?>
                        
                    @empty
                    <tr>

                        <td colspan="8" style="color:#000;font-size:30px">No Product Added</td>
                    </tr>
                    @endforelse
                   
                </tbody>
                
                <tfoot>
                    <td colspan="5" style="background-color: green;color:#fff;font-size:30px;text-align:center">Total Price : {{$totalPrice}} MAD </td>
                </tfoot>

            </table>

            <div  style="text-align: center">
                 <button style="background-color: blue ; padding:10px;color:#fff" id="order" >Order Now ? </button>

                 <div id="appear" style="display: none;margin-top:20px">

                    
                    <a class="btn btn-success" href="{{url('cash_order')}}">Cash On Delivery</a>
                    <a class="btn btn-primary" href="{{url('stripe', $totalPrice)}}">Pay With Card</a>


                 </div>
            </div>
            

            <div style="text-align: center;margin-top:30px">
                <a href="{{url('/login')}}" style="padding: 10px;background-color:rgb(26, 26, 27);color:#fff;width:80%">Back</a>
            </div>

        </div>
		
		


		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

        <script type="text/javascript">

            function confirmation(ev){
               ev.preventDefault();
               var urlToRedirect=ev.currentTarget.getAttribute('href');
       
               swal({
                   title:"Are You Sure Want To Delete This Product? ",
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

           <script type="text/javascript">

           $('#order').click(
           
           function(){
            $('#appear').show();
           }
           )
           $('#close').click(
            function(){
                $('#appear').hide();
            }
           )
           

           </script>
       
		@include('user.script')
    </body>
	
</html>