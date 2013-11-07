<?php

use Orm\Model;

class Model_Orderitem extends Model
{
	protected static $_properties = array(
		'id',
		'order_id',
		'product_id',
		'quantity',
	);

	protected static $_table_name = 'orderitems';

}
