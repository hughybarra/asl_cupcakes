<?php

class Controller_Cart extends Controller_Template {

	public function action_index() {
		//"cart functionality ";
		//"shows the cart lists products users have added to their cart";

		// FAKE
		$data['cart'] = array(
			array(
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
			), 
			array(
				'id' => '6',
				'name' => 'Whatever',
				'product_type' => 'something',
				'product_description' => 'Something',
				'price' => '2.50',
				'image_path' => '8',
				'quantity' => '20',
				'product_reviews' => '',
				'product_likes' => '',
				'created_at' => '',
				'updated_at' => ''
			)
		);
		
		$this -> template -> content = View::forge('cart/index', $data);
	}

}
