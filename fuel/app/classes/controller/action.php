<?php

class Controller_Action extends Controller
{

	public function action_logout()
	{
		echo "logged out";
	}

	public function action_signup()
	{
	    if(Input::post()){
			$users = Model_User::forge(array(
				'username'=>Input::post('username'),
				'password'=>Auth::hash_password(Input::post('password')),
				'email'=>Input::post('email')
			));

			if($users and $users->save()){
	    		Session::set_flash('success', 'User created.');
	    	}
	    }
	}

	public function action_login()
	{
		echo "login";
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
