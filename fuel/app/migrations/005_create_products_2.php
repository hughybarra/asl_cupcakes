<?php

namespace Fuel\Migrations;

class Create_products_2
{
	public function up()
	{
		\DBUtil::create_table('products_2', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'product_type' => array('constraint' => 255, 'type' => 'varchar'),
			'product_description' => array('type' => 'text'),
			'price' => array('constraint' => 11, 'type' => 'int'),
			'image_path' => array('constraint' => 255, 'type' => 'varchar'),
			'quantity' => array('constraint' => 11, 'type' => 'int'),
			'product_reviews' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('products_2');
	}
}