<?php

class Controller_Madserv extends Controller {

	function action_login() {

		//©2013 MadServ
		//all rights reserved
		//version 1.1
		//
		//
		//This file is a model file. It handles the get requests and return data
		//from the MadServ API for user authentication requests.
		//
		//You only need to edit your key and app id. Everything else has been handled for you.
		//Happy Sailing!

		//=======================================Edit This===================================
		//Just replace the key and app id with the ones
		//you received when you registered with MadServ
		$key = '28f76f49fa9a7174d217b7928b99888a';
		$app_id = '7b2cdade';

		//=============================Don't edit anything below here========================

		//built url, properly formatted for API
		$url = 'http://madserv.us/';
		$url .= '/api_request/validate_client/';
		$url .= $key;
		$url .= "/";
		$url .= $app_id;

		// 1. makes a REQUEST to the API to authenticate your app
		$request = file_get_contents($url);

		// 2. decodes the JSON REPLY from the API for use
		$decoded = json_decode(stripslashes($request), TRUE);

		$apiSecret = $decoded['secret'];
		$redirectURL = $decoded['redirect'];

		//hashes your key & app_id to build your secret
		//for API identification verification
		$appSecret = md5($key);
		$appSecret .= md5($app_id);

		// 3. checks secret key to be sure response was from the API
		//and not from some evil hacker named Mike
		if ($apiSecret == $appSecret) {

			// 4. upon success, the user is redirected to the API for authentication
			header("Location: " . $redirectURL . "/" . $app_id);

		} else {
			if (!$decoded) {
				$r = "NULL. Get from API failed.";
			} else {
				$r = " Secrets don't match. Beware! Someone may be trying to impersonate the MadServ API.";
			}

			echo "Server response: " . $r;
		}
	}

	function action_userdata() {

		//==============================EDIT THIS SECTION=============================================
		//encrypted data passed in the url on redirect
		$userdata = $_GET['en'];

		$app_id = 'df91512a';
		//replace with your App Id in string form

		//==============================DO NOT EDIT THIS SECTION======================================

		//=====================Decryption Algorithm======================
		if ($userdata) {

			//first decode the values retrieved from the callback
			$userdata_dec = base64_decode($userdata);

			$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);

			//retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
			$iv_dec = substr($userdata_dec, 0, $iv_size);

			//retrieves the cipher text (everything except the $iv_size in the front)
			$userdata_dec = substr($userdata_dec, $iv_size);

			//may remove 00h valued characters from end of plain text
			//uses your $app_if as the decryption key
			$plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $app_id, $userdata_dec, MCRYPT_MODE_CBC, $iv_dec);

			//formatted so that he odd numbered indexes are the values
			//and even are the names for these values
			$data_array = explode(',', $plaintext_dec);

			//===================Use these variables, and feel free to EDIT AFTER THIS POINT=================

			//values interpreted for you already
			$username = $data_array[1];
			$name = $data_array[3];
			$email = $data_array[5];

			// echo $name . "  " . $username . "  " . $email;
			// return "";

		}// /endif
	}

}
