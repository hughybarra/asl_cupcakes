<?php

class Controller_Tests extends Controller {

	public function action_index(){
		return View::forge('tests/index');
	}
}
