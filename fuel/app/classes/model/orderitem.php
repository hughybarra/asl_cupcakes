<?php

use Orm\Model;

class Model_OrderItem extends Model
{
	protected static $_properties = array(
		'id',
		'order_id',
		'product_id',
		'quantity',
	);

	protected static $_table_name = 'orderItems';

}
