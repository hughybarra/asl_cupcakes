<?php

class Controller_Action extends Controller_Rest {

	protected $format = 'json';
	
	public function action_addReview() {
		
		/* 
		 	add a new review to a product / Must be signed in
		 
		 	post vars:
				user_review 
		 		product_id
		 	
		 	user id is pulled from session variable. 
		*/
		
		// validate 
		if(
			!Input::post('uesr_review') ||
			!Input::post('product_id')
		){
			return $this -> response(array(
				'error' => 'variables not set'
			));
		}
		
		// setting function vars
		$user_review 	= Input::post('user_review');
		$user_id 		= Session::get('user')->id;
		$product_id 	= Input::post('product_id');
		

		// Inserting review into Db
		$new_review = Model_Review::forge(array(
			'user_id' 		=> $user_id,
			'product_id' 	=> $product_id,
			'user_review' 	=> $user_review
		));
		
		// save model
		if($new_review && $new_review->save()){
			Session::set_flash('success', 'review added');
			
			//output success
			return $this -> response(array(
				'success' => 'review added'
			));
		}
	}

	public function action_signup() {
		
		// validate
		
	    if(
	    	!Input::post('username') ||
	    	!Input::post('password') ||
			!Input::post('email')
		){
			
	    	return $this -> response(array(
	            'error' => 'variables not set'
	        ));
		}
		
		$username = strtolower(Input::post('username'));
		$email = strtolower(Input::post('email'));
		
		// create new model
		$user = Model_User::forge(array(
			'user_name' => $username,
			'user_pass' => Auth::hash_password(Input::post('password')),
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
	    	!Input::post('username') ||
	    	!Input::post('password')
		){
	    	return $this -> response(array(
	            'error' => 'variables not set'
	        ));
		}
		
		$username = strtolower(Input::post('username'));
		
		// create new model
		$user = Model_User::find_by_user_name($username);

		if(!$user){
			return $this -> response(array(
	            'error' => 'user not found'
	        ));
		}
		
		if(Auth::hash_password(Input::post('password')) != $user -> user_pass){
			return $this -> response(array(
				'error' => 'not logged in'
			));
		}
		
		// for some reason this is not running. 
		Session::set('user', array(
			'id' => $user -> id,
			'user_name' => $user -> user_name,
			'user_email' => $user -> user_pass
		));
		
		Session::set_flash('success', 'logged in');
		
		return $this -> response(array(
            'success' => 'logged in'
        ));
	
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
		echo 'addQuantity';
	}

	public function action_reduceQuantity() {
		echo 'reduceQuantity';
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

	public function action_addFavorite()
	{
		
		// validate
	    if(
			!Input::post('product_id')
		){
	    	return $this -> response(array(
	            'error' => 'variables not set'
	        ));
		}
		$product_id = Input::post('product_id');

		
		// create new model
		$favorite = Model_Favorite::forge(array(
			'user_id' => Session::get('user') -> id,
			'product_id' => $product_id
		));

		// save model
		if($favorite and $favorite->save()){
    		
    		Session::set_flash('success', 'added to favorites');
			
			// output success
			return $this -> response(array(
	            'success' => 'added to favorites'
   			));
		}else{
			return $this -> response(array(
				'success' => 'not added to favorites'
			));
		}
	}

	public function action_removeFavorite()
	{

		// validate
	    if(
			!Input::post('product_id')
		){
	    	return $this -> response(array(
	            'error' => 'variables not set'
	        ));
		}

		$product_id = Input::post('product_id');
		
		// create new model
		$favorite = Model_Favorite::find_by_user_id_and_product_id(Session::get('user') -> id, $product_id);

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
