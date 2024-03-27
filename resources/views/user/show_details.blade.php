<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->

        <base href="/public">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Dari_Shop Shop</title>

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
		

        <div style="margin-top:100px">

            <div class="section-header">
                <h2>Product Details </h2>
            </div><!--/.section-header-->

            <div class="col mt-5" style="padding:30px">
                <div class="card h-100" style="display: flex;justify-content:space-between;align-items:center">
                  <img src="{{'ProductImage/'.$product->image}}" class="card-img-top" style="width:500px;height:500px" alt="product Image ">
                  <div class="card-body" style="margin-left: 50px;width:50%;background-color:rgba(0,0,0,0.03);padding:10px;border-radius:20px">
                    <h2 class="card-title" style="font-size:40px;margin-bottom:20px">Title : <span style="color: rgb(106, 106, 138)">{{$product->title}}</span></h2>
                    <p class="card-text" style="font-size:15px;margin-bottom:20px">{{$product->description}}</p>
                    <h3 style="font-size:18px;margin-top:10px;border-bottom:4px solid green;width:fit-content"><span style="color:green">Category : {{$product->category}}</span></h3>
                    <h4 style="font-size:17px;margin-top:10px;border-bottom:4px solid rgb(161, 61, 61);width:fit-content"><span style="color:rgb(161, 61, 61)">Quantity : {{$product->quantity}}</span></h4>
                    <h5 style="font-size:18px;margin-top:10px;border-bottom:4px solid rgb(105, 23, 200);width:fit-content"><span style="color:rgb(105, 23, 200)">Price :{{$product->price}} MAD</span></h5>
                   
                   @if ($product->discount_price!=null)
                   <h6 style="font-size:18px;margin-top:10px;;border-bottom:4px solid rgb(133, 73, 189);width:fit-content"><span style="color:rgb(133, 73, 189)">Discount Price :{{$product->discount_price}} %</span></h5>
                   @else
                   <h6 style="font-size:20px;margin-top:10px;color:brown">No Discount Price for this product now ! </h5>                       
                       
                   @endif

                   <div style="margin-top: 20px">
                    <a href="{{url('/home')}}" class="btn btn-primary">Back</a>
                   </div>
                   

                     
                  </div>
                 
                </div>
              </div>




        </div>



	

       

        @include('user.footer')

        
		<!--footer end-->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		@include('user.script')
    </body>
	
</html>