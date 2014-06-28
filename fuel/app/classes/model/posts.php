<?php
use Orm\Model;

class Model_Posts extends Model
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
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('body', 'Body', 'required');
		$val->add_field('img', 'Img', 'required|max_length[255]');
		$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');
		$val->add_field('category_id', 'Category Id', 'required|valid_string[numeric]');
		$val->add_field('deadline', 'Deadline', 'required');
		$val->add_field('location_longitude', 'Location Longitude', 'required|valid_string[numeric]');
		$val->add_field('location_latitude', 'Location Latitude', 'required|valid_string[numeric]');

		return $val;
	}

}
