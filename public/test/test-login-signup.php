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
			<div class="login">
				<form>
					<div>
						<label for="email">Email Address</label>
						<input name="email" id="email" type="email" placeholder="ex: jdoe@domain.com">
					</div>
					<div>
						<label for="password">Password</label>
						<input type="password" name="password" id="password" type="text">
					</div>
					<button "sign_up" class="button-submit">
						Sign Up
					</button>
					
				</form>
			</div>
			
			<div class="signup">
				<div>
				<label for="firstname">First Name</label>
				<input name="firstname" id="firstName" type="text" placeholder="ex: John">
			</div>
			<div>
				<label for="lastname">Last Name</label>
				<input name="lastname" id="lastName" type="text" placeholder="ex: Doe">
			</div>
			<div>
				<label for="email">Email Address</label>
				<input name="email" id="email" type="email" placeholder="ex: jdoe@domain.com">
			</div>
			<div>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" type="text">
			</div>
			<div>
				<label for="confirmPassword">Confirm Password</label>
				<input type="password" name="confirmPassword" id="confirmPassword" type="text">
			</div>
			<div>
				<input id="terms" name="terms" value="I agree to the terms and conditions." type="checkbox">
				<label for="terms">I agree to the terms and conditions.</label>
			</div>
			<button "sign_up" class="button-submit">
				Sign Up
			</button>
			</div>
		</div>
		</div>