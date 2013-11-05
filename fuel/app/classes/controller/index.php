<?php

class Controller_Index extends Controller_Template
{

	public function action_landing()
	{
		$data["subnav"] = array('landing'=> 'active' );
		$this->template->title = 'Index &raquo; Landing';
		$this->template->content = View::forge('index/landing', $data);
	}

	public function action_productDetail()
	{
		$data["subnav"] = array('productDetail'=> 'active' );
		$this->template->title = 'Index &raquo; ProductDetail';
		$this->template->content = View::forge('index/productDetail', $data);
	}

	public function action_shopping()
	{
		$data["subnav"] = array('shopping'=> 'active' );
		$this->template->title = 'Index &raquo; Shopping';
		$this->template->content = View::forge('index/shopping', $data);
	}

	public function action_cart()
	{
		$data["subnav"] = array('cart'=> 'active' );
		$this->template->title = 'Index &raquo; Cart';
		$this->template->content = View::forge('index/cart', $data);
	}

	public function action_favorited()
	{
		$data["subnav"] = array('favorited'=> 'active' );
		$this->template->title = 'Index &raquo; Favorited';
		$this->template->content = View::forge('index/favorited', $data);
	}

}
