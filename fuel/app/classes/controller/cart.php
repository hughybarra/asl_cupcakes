<?php

class Controller_Cart extends Controller_Template {

	public function action_index() {
		//"cart functionality ";
		//"shows the cart lists products users have added to their cart";

		$data['something'] = 'Another var';
		
		$this -> template -> content = View::forge('cart/index', $data);
	}

}
