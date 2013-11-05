<?php

class Controller_Error extends Controller_Template
{

	public function action_404()
	{
		$data["subnav"] = array('404'=> 'active' );
		$this->template->title = 'Error &raquo; 404';
		$this->template->content = View::forge('error/404', $data);
	}

}
