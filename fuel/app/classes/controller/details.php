<?php

class Controller_Details extends Controller_Template
{

	public function action_index()
	{
		// manually setting product Id. javascript should pass that data. 	
		$product_id = 1;
		
		// prepare a select statement to find product by passed Id
		$query = Model_Product::find_by_id($product_id);
		
		$this -> template -> content = View::forge('details/index', $data);
	}

}
