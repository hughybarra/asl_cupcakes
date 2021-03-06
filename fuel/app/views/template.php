<html>
	<head>
		<title>ASL Project</title>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, width=device-width" />
		<?php echo Asset::css('main.css'); ?>
		<?php echo Asset::css('vendor/skeleton/stylesheets/skeleton.css'); ?>
		<?php echo Asset::css('vendor/skeleton/stylesheets/layout.css'); ?>
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

		<?php $user = Session::get('user'); ?>
		
		<?php if($user): ?>
			<script>
				var _user = <?php echo json_encode(array(
					'id' => $user['id'],
					'username' => $user['user_name']
				)); ?>;
			</script>
		<?php endif; ?>
		
	</head>
	<body>
		
		<div id="header_placeholder"></div>
		
		<?php $user = Session::get('user'); ?>
		<?php if($user && $user['id']):?>
			<header>
				<a id="logo" class="five columns column alpha" href="/">The Cupcake Factory</a>
				<div class="header-controls eight columns">
					<a class="header-cart" href="/cart"><img src="/assets/img/cart-icon.png">View Cart</a>
					<a class="header-favorites" href="/favorites"><img src="/assets/img/fave-icon.png">Favorites</a>
					<a id="header-logout">Log Out</a>
					<span id="header-signup" href="/users">Welcome, <?php echo $user['user_name']?></span>
				</div>
			</header>
		<?php else: ?>
			<header>
				<a id="logo" class="five columns column alpha" href="/">The Cupcake Factory</a>
				<div class="header-controls eight columns">
					<a id="header-signup" href="/users#signup">New here? Sign up!</a>
					<a class="header-cart" href="/cart"><img src="/assets/img/cart-icon.png">View Cart</a>
					<a id="header-login" href="/users">Log In</a>
					<!-- //With javascript send to the controller -->
					<a id="header-login-madserv" href="/madserv/login">Log In With MadServ</a>
				</div>
			</header>
		<?php endif; ?>
		
		<div class="container">
		<div id="ad_slot"><img src="http://www.madserv.us/index.php/adserv/postpic/7b2cdade"></div>
		
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
	<footer>
		<span>Group Project: The Cupcake Factory. ASL1311. Susan Brown, Hugo Ybarra, Jeremy McGraw. &copy;2013</span>
	</footer>
</html>