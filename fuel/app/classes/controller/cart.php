<?php

class Controller_Cart extends Controller
{

	public function action_index()
	{
		//"cart functionality ";
		//"shows the cart lists products users have added to their cart";
		
		$data['something'] = 'A testing variable';
		
		return View::forge('cart/index', $data);
	}

}
