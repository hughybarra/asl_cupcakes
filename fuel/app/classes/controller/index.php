<?php

class Controller_Index extends Controller
{

	public function action_index()
	{
		// products will be listed here
		echo "(products will be listed here)";
		
		
		// db testing 
		// prepare a select statement
		$query = DB::select('*')->from('products_2');
		
		foreach($query as $q){
			var_dump($q);
		}
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


