<?php

class Model_Post extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'title',
		'body',
		'img',
		'user_id',
		'category_id',
		'deadline',
		'location_longitude',
		'location_latitude',
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
	protected static $_table_name = 'posts';

}
