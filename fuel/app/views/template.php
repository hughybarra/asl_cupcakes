<html>
	<head>
		<title>ASL Project</title>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, width=device-width" />
		<link rel="stylesheet" href="/assets/css/main.css">
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	</head>
	<body>
		
		<div id="header_placeholder"></div>
		
		<header>
			<a id="logo" href="#">The Cupcake Factory</a>
			<div class="header-controls">
				<a class="header-cart" href="#"><img src="/assets/img/cart-icon.png">View Cart</a>
				<a class="header-favorites" href="#"><img src="/assets/img/fave-icon.png">Favorites</a>
				<div>
					<a class="header-logout" href="#">Log In</a>
					<span>New here? Sign up!</span>
				</div>
			</div>
		</header>	
		
		<div class="main">
		<div id="ad_slot"><span>Ad space</span></div>
		
		<?php echo $content; ?>
		
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script src="/js/main.js"></script>
	</body>
</html>