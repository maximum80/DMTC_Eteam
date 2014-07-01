<?php

namespace Fuel\Migrations;

class Add_userinfo_to_users
{
	public function up()
	{
		\DBUtil::add_fields('users', array(
			'group' => array('constraint' => 11, 'type' => 'int'),
			'last_login' => array('constraint' => 25, 'type' => 'varchar'),
			'login_hash' => array('constraint' => 255, 'type' => 'varchar'),
			'prifile_fields' => array('type' => 'text'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('users', array(
			'group'
,			'last_login'
,			'login_hash'
,			'prifile_fields'

		));
	}
}