<?php

namespace Fuel\Migrations;

class Rename_field_pass_to_password_in_users
{
	public function up()
	{
		\DBUtil::modify_fields('users', array(
			'pass' => array('name' => 'password', 'type' => 'varchar', 'constraint' => 255)
		));
	}

	public function down()
	{
	\DBUtil::modify_fields('users', array(
			'password' => array('name' => 'pass', 'type' => 'varchar', 'constraint' => 255)
		));
	}
}