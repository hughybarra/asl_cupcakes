<?php
class Controller_Favorites extends Controller_Template {

	public function action_index() {

		// making fake user id session variable 
		Session::set("user_id", 1);
		
		// grab all likes from a specific user
		$favorites = Model_Favorite::find_all_by_user_id(Session::get("user_id") );
		
		//declare blank arary
		$data["favorites"] = array();
		
		foreach($favorites as $d){
			// push each users like into data array
			$product = Model_Product::find_by_id($d["product_id"]);
			array_push($data["favorites"], $product);
		}
		
		
		// // FAKE
		// $data['favorite'] = array(
			// array(
				// 'id' => '7',
				// 'name' => 'Whatever',
				// 'product_type' => 'something',
				// 'product_description' => 'Something',
				// 'price' => '2.50',
				// 'image_path' => '7',
				// 'quantity' => '2',
				// 'product_reviews' => '',
				// 'product_likes' => '',
				// 'created_at' => '',
				// 'updated_at' => ''
			// ), 
			// array(
				// 'id' => '6',
				// 'name' => 'Whatever',
				// 'product_type' => 'something',
				// 'product_description' => 'Something',
				// 'price' => '2.50',
				// 'image_path' => '8',
				// 'quantity' => '20',
				// 'product_reviews' => '',
				// 'product_likes' => '',
				// 'created_at' => '',
				// 'updated_at' => ''
			// )
		// );
		
		$this -> template -> content = View::forge('favorites/index', $data);

	}

}
