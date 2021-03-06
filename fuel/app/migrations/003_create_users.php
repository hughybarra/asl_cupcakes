<?php

namespace Fuel\Migrations;

class Create_users
{
	public function up()
	{
		\DBUtil::create_table('users', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'password' => array('constraint' => 255, 'type' => 'varchar'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'username' => array('constraint' => 255, 'type' => 'varchar'),


		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}