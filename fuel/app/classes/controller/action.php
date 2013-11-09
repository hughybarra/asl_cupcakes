<?php

class Controller_Action extends Controller_Rest {

	protected $format = 'json';

	public function action_signup() {
		
		// validate
		
		// ATTENTION
		// it says we are validating vars here but I dont think 
		// the passwords are being compared...
		
		
	    if(
	    	// fixed the var names. They were targeting wrong post items. 
	    	!Input::post('username') ||
	    	!Input::post('password') ||
			!Input::post('email')
		){
			
	    	return $this -> response(array(
	            'error' => 'variables not set'
	        ));
		}
		
		$username = strtolower(Input::post('users-signup-username'));
		$email = strtolower(Input::post('users-signup-email'));
		
		// create new model
		$user = Model_User::forge(array(
			'user_name' => $username,
			'user_pass' => Auth::hash_password(Input::post('users-signup-password')),
			'user_email' => $email
		));
		
		// save model
		if($user and $user->save()){
    		
    		Session::set_flash('success', 'user created');
			
			// output success
			return $this -> response(array(
	            'success' => 'user created'
	        ));
			
    	}

	}

	public function action_login() {
		
		// validate
	    if(
	    	!Input::post('email') ||
	    	!Input::post('password')
		){
	    	return $this -> response(array(
	            'error' => 'variables not set'
	        ));
		}
		
		$username = strtolower(Input::post('email'));
		
		// create new model
		$user = Model_User::find_by_user_name($username);

		if(!$user){
			return $this -> response(array(
	            'error' => 'user not found'
	        ));
		}
		echo $user->user_pass;
		echo "   ";
		
		// for some reason this is not running. 
		if(Auth::hash_password(Input::post('password')) == $user -> user_pass){
		
			Session::set('user', array(
				'id' => $user -> id,
				'user_name' => $user -> user_name,
				'user_email' => $user -> user_pass
			));
			
			Session::set_flash('success', 'logged in');
			
			return $this -> response(array(
	            'success' => 'logged in'
	        ));
			
		}else{
			echo Auth::hash_password(Input::post("password"));
			return $this -> response(array(
			"success" => "not logged in"));
		}
	
	}
	
	public function action_logout() {
		
		Session::delete('user');
		
		Session::set_flash('success', 'logged out');
		
		return $this -> response(array(
            'success' => 'logged out'
        ));
	}

	public function action_addToCart() {
		
		// validate
	    if(
	    	!Input::post('item_id')
		){
	    	return $this -> response(array(
	            'error' => 'variables not set'
	        ));
		}
		
		// validate the cart exists
		$cart = Session::get('cart');
		
		if(!$cart)
		{
			Session::set('cart', array());
			$cart = Session::get('cart');
		}
		
		// get product from database
		$product = Model_Product::find_by_id(Input::get('item_id'));
		
		if(!$product){
			return $this -> response(array(
	            'error' => 'product not found'
	        ));
		}
		
		// push new product into cart
		array_push($cart, array(
			'item_id' => $product -> id,
			'name' => $product -> name,
			'price' => $product -> price
		));
		
		Session::set('cart', $cart);
		
		return $this -> response($cart);
		
	}

	public function action_removeFromCart() {
		
		// validate
	    if(
	    	!Input::post('item_id')
		){
	    	return $this -> response(array(
	            'error' => 'variables not set'
	        ));
		}
		
		// validate the cart exists
		$cart = Session::get('cart');
		
		if(!$cart)
		{
			Session::set('cart', array());
			$cart = Session::get('cart');
			
			return $this -> response($cart);
		}

		foreach ($cart as $key => $item) {
			if($item['item_id'] == Input::get('item_id')){
				unset($cart[$key]);
				break;
			}
		}
		
		Session::set('cart', $cart);
		
		return $this -> response($cart);
		
	}

	public function action_addQuantity() {
		echo "addQuantity";
	}

	public function action_reduceQuantity() {
		echo "reduceQuantity";
	}

	public function action_submitOrder() {
		
		$user_id = Session::get('user');

		$price = 0;
		
		$cart = Session::get('cart');
		
		if(!$cart){
			return $this -> response(array(
	            'error' => 'cart not set'
	        ));
		}
		
		foreach ($cart as $item) {
			$price += $item['price'];
		}
		
		$order = Model_Order::forge(array(
			'user_id' => $user_id,
			'order_total' => $price
		));

		$order->save();
		
		foreach ($cart as $item) {
			$order_item = Model_OrderItem::forge(array(
				'order_id' => $order->id,
				'product_id' => $item['item_id'],
				'quantity' => 1
			));
			$order_item->save();
		}
		
		Session::set('cart', array());
		
	}

	public function action_addFavorite($product_id)
	{
		
		// validate
	    if(
	    	!$product_id
		){
	    	return $this -> response(array(
	            'error' => 'variables not set'
	        ));
		}
		
		// making a fake session variable
		// Session::create("user_id");
		// Session::set("user_id", 1) ;
		
		// create new model
		$favorite = Model_Favorite::forge(array(
			'user_id' => Session::get("user") -> id,
			'product_id' => $product_id
		));

		// save model
		if($favorite and $favorite->save()){
    		
    		Session::set_flash('success', 'added to favorites');
			
			// output success
			return $this -> response(array(
	            'success' => 'added to favorites'
   			));
		}
	}

	public function action_removeFavorite($product_id)
	{

		// validate
	    if(
			!$product_id
		){
	    	return $this -> response(array(
	            'error' => 'variables not set'
	        ));
		}
		
		// making fake session variable 
		Session::create("user_id");
		Session::set("user_id", 1);
		
		echo Session::get("user_id");
		echo $product_id;
		// create new model
		$favorite = Model_Favorite::find_by_user_id_and_product_id(Session::get("user_id"), $product_id);

		if(!$favorite){
			return $this -> response(array(
	            'error' => 'favorite not found'
	        ));
		}

		// save model
		if($favorite->delete()){
    		
    		Session::set_flash('success', 'removed from favorites');
			
			// output success
			return $this -> response(array(
	            'success' => 'removed from favorites'
	    	));
		}
		
	}

}
