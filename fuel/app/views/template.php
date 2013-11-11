<html>
	<head>
		<title>ASL Project</title>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, width=device-width" />
		<?php echo Asset::css('main.css'); ?>
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	</head>
	<body>
		
		<div id="header_placeholder"></div>
		
		<?php $user = Session::get('user'); ?>
		<?php if($user && $user['id']):?>
			<header>
				<a id="logo" href="/">The Cupcake Factory</a>
				<div class="header-controls">
					<a class="header-cart" href="/cart"><img src="/assets/img/cart-icon.png">View Cart</a>
					<a class="header-favorites" href="/favorites"><img src="/assets/img/fave-icon.png">Favorites</a>
					<a id="header-logout">Log Out</a>
					<a id="header-signup" href="/users">Welcome, <?php echo $user['user_name']?></a>
				</div>
			</header>
		<?php else: ?>
			<header>
				<a id="logo" href="/">The Cupcake Factory</a>
				<div class="header-controls">
					<a class="header-cart" href="/cart"><img src="/assets/img/cart-icon.png">View Cart</a>
					<a class="header-favorites" href="/favorites"><img src="/assets/img/fave-icon.png">Favorites</a>
					<a id="header-login" href="/users">Log In</a>
					<a id="header-signup" href="/users">New here? Sign up!</a>
				</div>
			</header>
		<?php endif; ?>
		
		<div class="main">
		<div id="ad_slot"><span>Ad space</span></div>
		
		<?php echo $content; ?>
		
		</div>
		<!-- Jquery -->
		<!-- ======================================== -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<!-- ======================================== -->
		
		<!-- main.js -->
		<!-- ======================================== -->
		<?php echo Asset::js('main.js'); ?>
		<!-- ======================================== -->
	</body>
</html>