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
			<a class="header-cart" href="#">View Cart</a>
			<a class="header-favorites" href="#">Favorites</a>
			<span>Hi, USERNAME!</span>
			<a class="button-submit header-logout" href="#">Log Out</a>
		</header>	
		
		
		<div class="main">
		<h1>Shopping Cart</h1>
			<div class="shopping-cart">
				<div>
					<span>Total</span>
					<span>$23.54</span>
					<a href="#" class="button-submit">Checkout</a>
				</div>
			</div>
			<div class="cart-items">
				<?php for($i = 1; $i < 9; $i++):?>
					<div class="cart-item">
						<div class="cupcake-thumb">
							<img src="/assets/img/cupcakes/7.png">
						</div>
						<div class="cupcake-cart-info">
							<span class="cupcake-name">Cupcake Name</span>
							<span>Price</span>
							<span>$2.50</span>
							<span>Quantity</span>
							<span>2</span>
						</div>
					</div>
				<?php endfor; ?>
			</div>
			
		</div>
		
		</div>