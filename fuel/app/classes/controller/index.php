<?php

class Controller_Index extends Controller_Template {

	public function action_index() {

		//This is a necessary condition. It's advisable to stick the block in the constructor
		//of your API controller
		if (isset($_GET['en'])) {

			//==============================EDIT THIS SECTION=============================================

			$app_id = '7b2cdade';
			//replace with your App Id in string form

			//==============================DO NOT EDIT THIS SECTION======================================

			//encrypted data passed in the url on redirect
			$userdata = $_GET['en'];

			//=====================Decryption Algorithm======================
			if ($userdata) {

				$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($app_id), base64_decode(rawurldecode($userdata)), MCRYPT_MODE_CBC, md5(md5($app_id))), "\0");

				//formatted so that he odd numbered indexes are the values
				//and even are the names for these values
				$data_array = explode(',', $decrypted);

				//===================Use these variables, and feel free to EDIT AFTER THIS POINT=================

				//values interpreted for you already
				$username = $data_array[0];
				$name = $data_array[1];
				$email = strtolower($data_array[2]);

				$user = Model_User::find_by_user_name($username);
				
				// if the user is not created create them
				if(!$user){
					
					$user = Model_User::forge(array(
						'user_name' => $username, 
						'user_pass' => '', 
						'user_email' => $email
					));
					
					$user -> save();
					
				}
				
				// start a session for the user
				Session::set('user', array(
					'id' => $user -> id, 
					'user_name' => $user -> user_name, 
					'user_email' => $user -> user_email
				));

			}// /endif
		}// /en isset

		// products will be listed here
		$data['products'] = Model_Product::find('all');

		$this -> template -> content = View::forge('index/index', $data);

	}

}
