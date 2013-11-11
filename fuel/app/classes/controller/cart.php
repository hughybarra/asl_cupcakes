<?php

class Controller_Cart extends Controller_Template {

	public function action_index() {
		//"cart functionality ";
		//"shows the cart lists products users have added to their cart";

		$data['cart'] = Session::get('cart');

		if(!$data['cart']){
			$data['cart'] = array();
		}
		
		$this -> template -> content = View::forge('cart/index', $data);
	}

}
