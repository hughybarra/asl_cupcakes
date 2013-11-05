<?php

class Controller_Index extends Controller
{

	public function action_index()
	{
		echo "test";
		/*$data["subnav"] = array('landing'=> 'active' );
		$this->template->title = 'Index &raquo; Landing';
		$this->template->content = View::forge('index/landing', $data);*/
	}

	public function action_pDetail()
	{
		$data["subnav"] = array('pDetail'=> 'active' );
		$this->template->title = 'Index &raquo; PDetail';
		$this->template->content = View::forge('index/pDetail', $data);
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
