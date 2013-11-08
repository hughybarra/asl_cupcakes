<?php
class Controller_Favorites extends Controller {

	public function action_index() {



		// products will be listed here		
		$data['favorites'] = Model_Favorite::find('all');
		
		foreach($data as $d){
			echo var_dump($d);
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
		
		// $this -> template -> content = View::forge('favorites/index', $data);

	}

}
