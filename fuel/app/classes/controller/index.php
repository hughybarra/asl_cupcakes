<?php

class Controller_Index extends Controller_Template
{

	public function action_index()
	{
		// products will be listed here		
		$data['products'] = Model_Product::find("all");
	
		$this -> template -> content = View::forge('index/index', $data);
	}

}


/* 

/ (products)

/details/:id
/cart/

/users (signup/login)



/action/logout
/action/signup/
/action/login/
/action/add_to_cart
/action/remove_from_cart
/action/add_quantity
/action/reduce_quantity
/action/submit_order

*/


