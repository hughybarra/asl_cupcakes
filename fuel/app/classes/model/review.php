<?php

class Model_Review extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'product_id',
		'comment',
	);

	protected static $_table_name = 'reviews';

}
