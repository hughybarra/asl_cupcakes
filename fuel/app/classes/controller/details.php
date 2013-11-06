<?php

class Controller_Details extends Controller
{

	public function action_index()
	{
		echo "product details displays all information on one product";
		
		// manually setting product Id. javascript should pass that data. 
		$product_id = 1;
		
		// prepare a select statement to find product by passed Id
		$query = Model_Product::find_by_id($product_id);
		
		// db working here
		echo $query->name;
	}

}
