<?php

class Controller_Action extends Controller_Rest
{
	
	protected $format = 'json';

	public function action_logout()
	{
		Auth::logout();
		Session::set_flash('success', 'Logged out.');
	}

	public function action_signup()
	{
	    if(Input::post()){
	    	
			$users = Model_User::forge(array(
				'username' => Input::post('username'),
				'password' => Auth::hash_password(Input::post('password')),
				'email' => Input::post('email')
			));

			if($users and $users->save()){
	    		
	    		Session::set_flash('success', 'User created.');
				
				return $this -> response(array(
		            'success' => 'User created.'
		        ));
				
	    	}
			
	    }
		
		return $this -> response(array(
            'success' => 'User created.'
        ));
	}

	public function action_login()
	{
    	if(Input::post()){

    		if(Auth::login(Input::post('username'), Auth::hash_password(Input::post('password')))){

    			Session::set_flash('success', 'Successfully logged in! Welcome back');
    		}else{

    			Session::set_flash('error', 'Username or password incorrect.');
    		}
    	}
	}

	public function action_addToCart()
	{
		echo "addToCart";
	}

	public function action_removeFromCart()
	{
		echo "removeFromCart";
	}

	public function action_addQuantity()
	{
		echo "addQuantity";
	}

	public function action_reduceQuantity()
	{
		echo "reduceQuantity";
	}

	public function action_submitOrder()
	{
		echo "submitOrder";
	}

}
