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
		$users = Model_User::forge(array(
			'username' => Input::post('username'),
			'password' => Auth::hash_password(Input::post('password')),
			'email' => Input::post('email')
		));

		// save model
		if($users and $users->save()){
    		
    		Session::set_flash('success', 'User created.');
			
			// output success
			return $this -> response(array(
	            'success' => 'User created.'
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
		
		if($user){
			
			if(Auth::hash_password(Input::post('password')) == $user -> password){
			
				Session::set('user', array(
					'id' => $user -> id,
					
					// more stuff here
				));
				
				return $this -> response(array(
		            'success' => 'logged in'
		        ));
				
			}
			
		}
	
	}
	
	public function action_logout() {
		Session::delete('user');
	}

	public function action_addToCart() {
		echo "addToCart";
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

	public function action_addFavorite()
	{
		echo "addFavorite";
	}

	public function action_removeFavorite()
	{
		echo "removeFavorite";
	}

}
