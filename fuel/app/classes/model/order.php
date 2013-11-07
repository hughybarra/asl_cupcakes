<?php

use Orm\Model;

class Model_Order extends Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'order_total',
	);

	protected static $_table_name = 'orders';

}
