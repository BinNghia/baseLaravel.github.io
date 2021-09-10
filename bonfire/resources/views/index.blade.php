<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BONFIRE</title>
	<base href="{{asset('')}}" >
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,700;1,600&family=Fira+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/script.js"></script>
    <style>
    	.pagination {
		  display: flex;
		  margin: 15px 0;
		}
		.pagination li {
		  padding: 10px 15px;
		  border: 1px solid #ababab;
		}
    </style>
</head>
<body>
	<div class="cover"></div>
	<div class="wrapper">
		
		@include('header')

	    @yield('content')

	    @include('footer')
		
	</div>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js">
	</script>
	<script>
		$(document).ready(function(){
			$('.image-item').slick({
				prevArrow:"<img class='a-left control-c prev slick-prev' src='assets/img/prev.jpg'>",
	    		nextArrow:"<img class='a-right control-c next slick-next' src='assets/img/next.png'>"
			});
			$('.nav-icon').on('click', function(e) {
				e.preventDefault();
				$('.navbar').addClass('active');
				$('.cover').addClass('active');
			});
			$('.cart-wrap').on('click', function(e) {
				e.preventDefault();
				$('.cart-body').addClass('active');
				$('.cover').addClass('active');
			});
			$('.search-icon').on('click', function(e) {
				e.preventDefault();
				$('.searchbar').addClass('active');
				$('.cover').addClass('active');
			});
			$('.cover').on('click', function(e) {
				e.preventDefault();
		        $('.navbar').removeClass('active');
		        $('.cart-body').removeClass('active');
		        $('.searchbar').removeClass('active');
		        $('.cover').removeClass('active');
		    });
		});
		gsap.from(".logo_header", { opacity: 0, duration: 1, delay: 0.5, x: -50 });
		gsap.from(".header-down-left .text1_header", { opacity: 0, duration: 1, delay: 1, y: -50 });
		gsap.from(".header-down-left .text2_header", { opacity: 0, duration: 1, delay: 1.5, y: -45 });
		gsap.from(".header-down-left .text3_header", { opacity: 0, duration: 1, delay: 2.5, y: 100 });
	</script>
</body>
</html>