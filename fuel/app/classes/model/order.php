<?php

class Model_Order extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'order_total',
	);

	protected static $_table_name = 'orders';

}
