<?php

namespace Fuel\Migrations;

class Create_orderitems
{
	public function up()
	{
		\DBUtil::create_table('orderitems', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'item_id' => array('constraint' => 11, 'type' => 'int'),
			'order_id' => array('constraint' => 11, 'type' => 'int'),
			'cake_id' => array('constraint' => 11, 'type' => 'int'),
			'quantity' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('orderitems');
	}
}