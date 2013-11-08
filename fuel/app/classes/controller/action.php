<?php

class Controller_Action extends Controller_Rest {

	protected $format = 'json';

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
    	
		// create new model
		$user = Model_User::forge(array(
			'username' => Input::post('username'),
			'password' => Auth::hash_password(Input::post('password')),
			'email' => Input::post('email')
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
    	
		// create new model
		$user = Model_User::find_by_username(Input::post('username'));
		
		if(!$user){
			return $this -> response(array(
	            'error' => 'user not found'
	        ));
		}
			
		if(Auth::hash_password(Input::post('password')) == $user -> password){
		
			Session::set('user', array(
				'id' => $user -> id,
				// TODO
				// more stuff here
			));
			
			Session::set_flash('success', 'logged in');
			
			return $this -> response(array(
	            'success' => 'logged in'
	        ));
			
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
		
		$cart = Session::get('cart');

		if(!$cart)
		{
		   $cart = Session::set('cart', array(
			'item_id' => $cart -> item_id
			));
		}
	}

	public function action_removeFromCart() {
		echo "removeFromCart";
	}

	public function action_addQuantity() {
		echo "addQuantity";
	}

	public function action_reduceQuantity() {
		echo "reduceQuantity";
	}

	public function action_submitOrder() {
		echo "submitOrder";
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
