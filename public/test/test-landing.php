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
			<a class="header-logout" href="#">Log Out</a>
		</header>	
		<div class="main">
		
		<div id="ad_slot"><span>Ad space</span></div>		
		
		<?php for($i = 1; $i < 9; $i++):?>
			<div class="cupcake">
				<div class="cupcake-thumb">
					<img src="/img/cupcakes/<?php echo($i)?>.png">
				</div>
				<div class="cupcake-info">
					<span class="cupcake-name">Cupcake Name</span>
					<span>$2.50</span>
					<span>Short description of the cupcake will go here.</span>
				</div>
			</div>
		<?php endfor; ?>
		</div>
	</body>
</html>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<!-- 		<script src="<?php echo $GLOBALS['web_root']; ?>js/main.js"></script> -->
	</body>
</html>