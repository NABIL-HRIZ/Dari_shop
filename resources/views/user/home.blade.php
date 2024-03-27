<!doctype html>
<html class="no-js" lang="en">

    <head>
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
		
		
		
	
		<!--welcome-hero start -->
		<header id="home" class="welcome-hero">

			

            <!-- hERO SECTION  -->

            @include('user.hero_section')

            <!-- End Hero section -->




			<!-- Nav -->
			@include('user.navbar')
			<!-- nav End -->

		</header>

		<!--populer-products start -->
		

        @include('user.populer')


		<!--populer-products end-->

		<!--new-arrivals start -->
		
        
       @include('user.table_room')

		<!--new-arrivals end -->


		<!--feature start -->
		

        @include('user.bed_room')


		<!--feature end -->

		<!--blog start -->
		

        @include('user.blog')


		<!--blog end -->

		<!-- clients strat -->
		

        @include('user.client')

		<!-- clients end -->

		<!--newsletter strat -->
	

        @include('user.newsletter')

		<!--newsletter end -->

		<!--footer start-->
		

        @include('user.footer')

		<!--footer end-->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		@include('user.script')
    </body>
	
</html>