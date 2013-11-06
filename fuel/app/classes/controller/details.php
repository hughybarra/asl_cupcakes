<?php

class Controller_Details extends Controller_Template
{

	public function action_index()
	{
		$data['cart'] = array(
			'id' => '7',
			'name' => 'Whatever',
			'product_type' => 'something',
			'product_description' => 'Something',
			'price' => '2.50',
			'image_path' => '7',
			'quantity' => '2',
			'product_reviews' => '',
			'product_likes' => '',
			'created_at' => '',
			'updated_at' => ''
		);
		
		$this -> template -> content = View::forge('details/index', $data);
	}

}
