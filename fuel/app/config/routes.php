<?php
return array(
	'_root_'  => 'index/index',  // The default route
	'_404_'   => 'error/404',    // The main 404 route
	
	'details/index/:id' => 'details/index/$1',
	'details/:id' => 'details/index/$1',
);