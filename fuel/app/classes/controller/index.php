<?php

class Controller_Index extends Controller
{

	public function action_index()
	{
		// products will be listed here
		echo "(products will be listed here) <hr>";
		$posts = Model_Product::find("all");
	
		// loop through all products 
		foreach($posts as $p){
			echo $p->name;
			echo "<hr>";
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


