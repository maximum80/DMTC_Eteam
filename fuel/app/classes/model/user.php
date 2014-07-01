<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'email',
		'password',
		'tel',
		'img',
		'created_at',
		'updated_at',
		'group',
		'last_login',
		'login_hash',
		'profile_fields'
	);

//	static protected $_profile_fields = array('fname','lname','tel');

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),

		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		)
	);

	protected static $_table_name = 'users';


	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('username', 'Username', 'ユーザー名が正しくありません');
		$val->add_field('email', 'Email', 'メールアドレスが正しくありません');
		$val->add_field('password', 'Password', 'パスワードが正しくありません');
		$val->add_field('tel', 'Tel', '電話番号が正しくありません');
		$val->add_field('img', 'Img', '画像が正しくありません');

		return $val;
	}
}
