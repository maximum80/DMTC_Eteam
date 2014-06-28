<?php

namespace Fuel\Migrations;

class Create_posts
{
	public function up()
	{
		\DBUtil::create_table('posts', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'body' => array('type' => 'TEXT'),
			'img' => array('constraint' => 255, 'type' => 'varchar'),
			'user_id' => array('type' => 'INT'),
			'category_id' => array('type' => 'INT'),
			'deadline' => array('type' => 'DATETIME'),
			'location_longitude' => array('type' => 'INT'),
			'location_latitude' => array('type' => 'INT'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('posts');
	}
}