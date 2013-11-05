<?php

class Controller_Action extends Controller_Template
{

	public function action_logout()
	{
		$data["subnav"] = array('logout'=> 'active' );
		$this->template->title = 'Action &raquo; Logout';
		$this->template->content = View::forge('action/logout', $data);
	}

	public function action_signup()
	{
		$data["subnav"] = array('signup'=> 'active' );
		$this->template->title = 'Action &raquo; Signup';
		$this->template->content = View::forge('action/signup', $data);
	}

	public function action_login()
	{
		$data["subnav"] = array('login'=> 'active' );
		$this->template->title = 'Action &raquo; Login';
		$this->template->content = View::forge('action/login', $data);
	}

	public function action_addToCart()
	{
		$data["subnav"] = array('addToCart'=> 'active' );
		$this->template->title = 'Action &raquo; AddToCart';
		$this->template->content = View::forge('action/addToCart', $data);
	}

	public function action_removeFromCart()
	{
		$data["subnav"] = array('removeFromCart'=> 'active' );
		$this->template->title = 'Action &raquo; RemoveFromCart';
		$this->template->content = View::forge('action/removeFromCart', $data);
	}

	public function action_addQuantity()
	{
		$data["subnav"] = array('addQuantity'=> 'active' );
		$this->template->title = 'Action &raquo; AddQuantity';
		$this->template->content = View::forge('action/addQuantity', $data);
	}

	public function action_reduceQuantity()
	{
		$data["subnav"] = array('reduceQuantity'=> 'active' );
		$this->template->title = 'Action &raquo; ReduceQuantity';
		$this->template->content = View::forge('action/reduceQuantity', $data);
	}

	public function action_submitOrder()
	{
		$data["subnav"] = array('submitOrder'=> 'active' );
		$this->template->title = 'Action &raquo; SubmitOrder';
		$this->template->content = View::forge('action/submitOrder', $data);
	}

}
