<?php

namespace Fuel\Migrations;

class Create_orderitems_2
{
	public function up()
	{
		\DBUtil::create_table('orderitems_2', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'order_id' => array('constraint' => 11, 'type' => 'int'),
			'product_id' => array('constraint' => 11, 'type' => 'int'),
			'quantity' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('orderitems_2');
	}
}