<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'email',
		'pass',
		'tel',
		'img',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	protected static $_table_name = 'users';


	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required');
		$val->add_field('pass', 'Pass', 'required|max_length[255]');
		$val->add_field('tel', 'Tel', 'required|valid_string[numeric]');

		return $val;
	}
}
