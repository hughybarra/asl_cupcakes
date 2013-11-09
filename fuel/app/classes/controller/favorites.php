<?php
class Controller_Favorites extends Controller_Template {

	public function action_index() {
		
		$user = Session::get("user");
		$user_id = $user['id'];
		
		// grab all likes from a specific user
		$favorites = Model_Favorite::find_all_by_user_id($user_id);
		
		//declare blank arary
		$data["favorites"] = array();
		
		foreach($favorites as $d){
			// push each users like into data array
			$product = Model_Product::find_by_id($d["product_id"]);
			array_push($data["favorites"], $product);
		}
	
		$this -> template -> content = View::forge('favorites/index', $data);

	}

}
