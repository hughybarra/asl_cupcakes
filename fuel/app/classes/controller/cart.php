<?php

class Controller_Cart extends Controller_Template {

	public function action_index() {
		//'cart functionality ';
		//'shows the cart lists products users have added to their cart';

		$cart = Session::get('cart');

		if(!$cart){
			$cart = array();
		}
		
		$data['cart'] = array();
		
		$data['total'] = 0;
		
		foreach ($cart as $item) {
		
			$product = Model_Product::find_by_id($item['item_id']);

			array_push($data['cart'], array(
				'id' => $product['id'],
	            'name' => $product['name'],
	            'product_type' => $product['product_type'],
	            'product_description' => $product['product_description'],
	            'price' => $product['price'],
	            'image_path' => $product['image_path'],
	            'created_at' => $product['created_at'],
	            'updated_at' => $product['updated_at'],
	            'quantity' => $item['quantity']
			));
			
			// calcualte the total
			$data['total'] += $product['price'] * $item['quantity'];
			
		}
		
		$this -> template -> content = View::forge('cart/index', $data);
	}

}
