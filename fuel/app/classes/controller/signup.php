<?php

class Controller_Signup extends Controller_Template
{

	public function action_index()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('index');

			$val->add('username', 'Your username')->add_rule('required');
			//					->add_rule('required_with',$fieldname);

			$val->add('password', 'Your password')->add_rule('required')
				->add_rule('min_length', 3)
				->add_rule('max_length', 10);

			$val->add('email', 'Your email')->add_rule('required')
				->add_rule('min_length', 6)
				->add_rule('valid_email');

			$val->add('tel','Your tel')->add_rule('required')
				->add_rule('valid_string',$flags = array('numeric', 'utf8'));

			// var_dump(Model_User::find(array('where' => array('username',$username = Input::post('username')))));exit;
			// $username_count = Model_User::find(array('where' => array('email',$email = Input::post('email'))));
			// if($username_count > 0){
			// 	Session::set_flash('error', 'ユーザー名が重複しています');
			// 	Response::redirect('welcome/index');
			// } else {
			// 	if($email_count > 0){
			// 		Session::set_flash('error', 'Eメールアドレスが重複しています');
			// 		Response::redirect('welcome/index');
			// 	}
			// }
			if ($val->run()) {
				Auth::create_user(Input::post('username'),Input::post('password'),Input::post('email'),
					array(
						Input::post('tel'),
						Input::post('img')));

				// $user = Model_User::forge(array(
				// 	'username' => Input::post('username'),
				// 	'email' => Input::post('email'),
				// 	'password' => Input::post('password'),
				// 	'tel' => Input::post('tel'),
				// 	'img' => Input::post('img'),
				// 	'group' => '1',
				// 	'last_login' => '1',
				// 	'login_hash' => '1',
				// 	'profile_fields' => 'test'
				// ));

				//				if ($user = run()) {
				Session::set_flash('success', '会員登録が完了しました。');
				Response::redirect('mypage');

				//				} else {
				//					Session::set_flash('error', '登録できませんでした');
				//				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "会員登録";
		$this->template->content = View::forge('signup/index');

	}

}
