<?php

class Controller_Details extends Controller_Template {

	public function action_index($product_id) {

		// prepare a select statement to find product by passed Id
		$data['product'] = Model_Product::find_by_id($product_id);

		// trigger a 404 error is no product is found
		if (!$data['product']) {
			$this -> template -> content = Response::forge(View::forge('error/404'), 404);
			return;
		}
		
		// pull in all product reviews 
		$data['reviews'] = Model_Review::find_all_by_product_id($product_id);
		
		$this -> template -> content = View::forge('details/index', $data);
	}

}
