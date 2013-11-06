<?php

class Controller_Details extends Controller
{

	public function action_index($product_id)
	{
		// prepare a select statement to find product by passed Id
		$data['product'] = Model_Product::find_by_id($product_id);
		$this -> template -> content = View::forge('cart/index', $data);
	}

}
