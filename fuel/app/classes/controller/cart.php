<?php

class Controller_Cart extends Controller_Template {

	public function action_index() {
		//"cart functionality ";
		//"shows the cart lists products users have added to their cart";

		$cart = Session::get('cart');

		if(!$cart){
			$cart = array();
		}
		
		$data['cart'] = array();
		
		foreach ($cart as $item) {
			$product = Model_Product::find_by_id($item['item_id']);
			array_push($data['cart'], $product);
		}
		
		$this -> template -> content = View::forge('cart/index', $data);
	}

}
