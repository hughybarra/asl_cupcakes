<!-- LOGIN FORM -->
<!-- ======================================== -->
<!-- ======================================== -->
<div class="login">
	<h1>Already a member?</h1>
	<span>Great! Sign in here.</span>
	<div>
		<label for="users-login-username">Username</label>
		<input name="users-login-username" id="users-login-username" type="text" placeholder="ex: John">
	</div>
	<div>
		<label for="users-login-password">Password</label>
		<input type="password" name="users-login-password" id="users-login-password" type="text">
	</div>
	<button id="users-login-submit" class="button-submit">
		Log In
	</button>
</div>
<!-- SIGN UP FORM -->
<!-- ======================================== -->
<!-- ======================================== -->
<div class="signup">
	<h1>Sign up with The Cupcake Factory.</h1>
	<p>An account with The Cupcake Factory will allow you to add items to a favorites list and allow you to place online orders. Best of all, it's free!</p>
	<form
	method="post"
	action="action/signup">
		<div>
			<label for="users-signup-username">Username</label>
			<input name="users-signup-username" id="users-signup-username" type="text" placeholder="ex: John">
		</div>
		<div>
			<label for="users-signup-email">Email Address</label>
			<input name="users-signup-email" id="users-signup-email" type="email" placeholder="ex: jdoe@domain.com">
		</div>
		<div>
			<label for="users-signup-password">Password</label>
			<input type="password" name="users-signup-password" id="users-signup-password" type="text">
		</div>
		<div>
			<label for="users-signup-confirm-password">Confirm Password</label>
			<input type="password" name="users-signup-confirm-password" id="users-signup-confirm-password" type="text">
		</div>
		<div>
			<input id="users-signup-terms" name="users-signup-confirm-terms" value="I agree to the terms and conditions." type="checkbox">
			<label for="users-signup-confirm-terms">I agree to the terms and conditions.</label>
		</div>
		<button id="users-signup-submit" class="button-submit">
			Sign Up
		</button>
	</form>
</div>
<img id="login-graphic" src="/assets/img/cupcakes/login-graphic.png">