<?php

namespace Fuel\Migrations;

class Rename_field_prifile_fields_to_profile_fields_in_users
{
	public function up()
	{
		\DBUtil::modify_fields('users', array(
			'prifile_fields' => array('name' => 'profile_fields', 'type' => 'text')
		));
	}

	public function down()
	{
	\DBUtil::modify_fields('users', array(
			'profile_fields' => array('name' => 'prifile_fields', 'type' => 'text')
		));
	}
}