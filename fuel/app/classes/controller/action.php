<?php

class Controller_Action extends Controller_Rest {
	//Need a constructor to run the decrypt function
	protected $format = 'json';

	public function action_addReview() {

		/* post vars:
		 user_review
		 product_id
		 */

		// validate

		if (!Input::post('user_review') || !Input::post('product_id')) {
			return $this -> response(array('error' => 'variables not set'));
		}

		$user = Session::get('user');

		if (!$user) {
			return $this -> response(array('error' => 'user not set'));
		}

		$user_id = $user['id'];

		// setting function vars
		$user_review = Input::post('user_review');
		$product_id = Input::post('product_id');

		// Inserting review into Db
		$new_review = Model_Review::forge(array('user_id' => $user_id, 'product_id' => $product_id, 'user_review' => $user_review));

		// save model
		if ($new_review && $new_review -> save()) {
			Session::set_flash('success', 'review added');

			//output success
			return $this -> response(array('success' => 'review added'));
		}
	}

	public function action_signup() {

		/*	post vars:
		 username
		 password
		 email
		 */

		// validate
		if (!Input::post('username') || !Input::post('password') || !Input::post('email')) {

			return $this -> response(array('error' => 'variables not set'));
		}

		// check the database for existing user name
		$check_user = Model_User::find_by_user_name(Input::post('username'));

		if ($check_user) {
			return $this -> response(array('error' => 'username already exists'));
		}

		$username = strtolower(Input::post('username'));
		$email = strtolower(Input::post('email'));

		// create new model
		$user = Model_User::forge(array('user_name' => $username, 'user_pass' => Auth::hash_password(Input::post('password')), 'user_email' => $email));

		// save model
		if ($user and $user -> save()) {
			Session::set('user', array('id' => $user -> id, 'user_name' => $user -> user_name, 'user_email' => $user -> user_email));
			// output success
			return $this -> response(array('success' => 'user created'));

		}

	}

	public function action_login() {
		// done
		/* post vars :
		 username
		 password
		 */

		// validate
		if (!Input::post('username') || !Input::post('password')) {
			return $this -> response(array('error' => 'variables not set'));
		}

		$username = strtolower(Input::post('username'));

		// create new model
		$user = Model_User::find_by_user_name($username);

		if (!$user) {
			return $this -> response(array('error' => 'user not found'));
		}

		if (Auth::hash_password(Input::post('password')) != $user -> user_pass) {
			return $this -> response(array('error' => 'not logged in'));
		}

		Session::set('user', array('id' => $user -> id, 'user_name' => $user -> user_name, 'user_email' => $user -> user_email));

		return $this -> response(array('success' => 'logged in'));

	}

	public function action_logout() {

		Session::delete('user');

		Session::set_flash('success', 'logged out');

		return $this -> response(array('success' => 'logged out'));
	}

	public function action_addToCart() {

		/* post vars:
		 item_id
		 * quantity
		 */

		// validate
		if (!Input::post('item_id') || !Input::post("quantity")) {
			return $this -> response(array('error' => 'variables not set'));
		}

		// validate the cart exists
		$cart = Session::get('cart');

		if (!$cart) {
			Session::set('cart', array());
			$cart = Session::get('cart');
		}

		// get product from database
		$product = Model_Product::find_by_id(Input::post('item_id'));

		if (!$product) {
			return $this -> response(array('error' => 'product not found'));
		}

		// push new product into cart
		array_push($cart, array('quantity' => Input::post('quantity'), 'item_id' => $product -> id, 'name' => $product -> name, 'price' => $product -> price));

		Session::set('cart', $cart);

		return $this -> response($cart);

	}

	public function action_removeFromCart() {

		/* post vars:
		 item_id
		 */

		// validate
		if (!Input::post('item_id')) {
			return $this -> response(array('error' => 'variables not set'));
		}

		// validate the cart exists
		$cart = Session::get('cart');

		if (!$cart) {
			Session::set('cart', array());
			$cart = Session::get('cart');

			return $this -> response($cart);
		}

		foreach ($cart as $key => $item) {
			if ($item['item_id'] == Input::post('item_id')) {
				unset($cart[$key]);
				break;
			}
		}

		Session::set('cart', $cart);

		return $this -> response($cart);

	}

	public function action_quantity() {

		/* post vars:
		 quantity
		 */

		// validate

		if (!Input::post('quantity')) {
			return $this -> response(array('error' => 'variables not set'));
		}

		Session::set('cart') -> quantity = Input::post('quantity');
	}

	public function action_submitOrder() {

		$user = Session::get('user');

		if (!$user) {
			return $this -> response(array('error' => 'user not set'));
		}

		$user_id = $user['id'];

		$price = 0;

		$cart = Session::get('cart');

		if (!$cart) {
			return $this -> response(array('error' => 'cart not set'));
		}

		foreach ($cart as $item) {
			$price += $item['price'];
		}

		$order = Model_Order::forge(array('user_id' => $user_id, 'order_total' => $price));

		$order -> save();

		foreach ($cart as $item) {
			$order_item = Model_OrderItem::forge(array('order_id' => $order -> id, 'product_id' => $item['item_id'], 'quantity' => 1));
			$order_item -> save();
		}

		Session::set('cart', array());

		return $this -> response(array('success' => 'order submitted'));
	}

	public function action_addFavorite() {

		/* post vars:
		 product_id
		 */

		// session validation
		$user = Session::get('user');

		if (!$user) {
			return $this -> response(array('error' => 'please log in'));
		}

		$user_id = $user['id'];

		//validate
		if (!Input::post('product_id')) {
			return $this -> response(array('error' => 'variables not set'));
		}

		$product_id = Input::post('product_id');

		// create new model
		$favorite = Model_Favorite::forge(array('user_id' => $user_id, 'product_id' => $product_id));

		// save model
		if ($favorite and $favorite -> save()) {

			Session::set_flash('success', 'added to favorites');

			// output success
			return $this -> response(array('success' => 'added to favorites'));
		} else {
			return $this -> response(array('success' => 'not added to favorites'));
		}
	}

	public function action_removeFavorite() {
		/* post vars:
		 product_id
		 */

		// validate
		if (!Input::post('product_id')) {
			return $this -> response(array('error' => 'variables not set'));
		}

		$product_id = Input::post('product_id');

		$user = Session::get('user');
		
		if (!$user) {
			return $this -> response(array('error' => 'user not set'));
		}
		
		$user_id = $user['id'];

		// create new model
		$favorite = Model_Favorite::find_by_user_id_and_product_id($user_id, $product_id);

		if (!$favorite) {
			return $this -> response(array('error' => 'favorite not found'));
		}

		// save model
		if ($favorite -> delete()) {

			Session::set_flash('success', 'removed from favorites');

			// output success
			return $this -> response(array('success' => 'removed from favorites'));
		}

	}

	public function action_userDecrypt() {
		//This is a necessary condition. It's advisable to stick the block in the constructor
		//of your API controller
		if (isset($_GET['en'])) {

			//==============================EDIT THIS SECTION=============================================

			$app_id = '7b2cdade';
			//replace with your App Id in string form

			//==============================DO NOT EDIT THIS SECTION======================================

			//encrypted data passed in the url on redirect
			$userdata = $_GET['en'];

			//=====================Decryption Algorithm======================
			if ($userdata) {
				//first decode the values retrieved from the callback
				$userdata_dec = base64_decode($userdata);

				$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);

				//retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
				$iv_dec = substr($userdata_dec, 0, $iv_size);

				//retrieves the cipher text (everything except the $iv_size in the front)
				$userdata_dec = substr($userdata_dec, $iv_size);

				//may remove 00h valued characters from end of plain text
				//uses your $app_if as the decryption key
				$plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $app_id, $userdata_dec, MCRYPT_MODE_CBC, $iv_dec);

				//formatted so that he odd numbered indexes are the values
				//and even are the names for these values
				$data_array = explode(',', $plaintext_dec);

				//===================Use these variables, and feel free to EDIT AFTER THIS POINT=================

				//values interpreted for you already
				//Still need to update session variables
				$username = $data_array[1];
				$name = $data_array[3];
				$email = $data_array[5];

				var_dump($name);

				// echo $name . "  " . $username . "  " . $email;
				// return "";

			}// /endif
		} // /en isset
	}

}
