<?php

class Controller_Signup extends Controller_Template
{

	public function action_index()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			if ($val->run()) {
				$user = Model_User::forge(array(
					'name' => Input::post('name'),
					'email' => Input::post('email'),
					'pass' => Input::post('pass'),
					'tel' => Input::post('tel'),
					'img' => Input::post('img'),
				));

				if ($user and $user->save()) {
					Session::set_flash('success', '会員登録が完了しました。');
					Response::redirect('mypage');
				}

				else {
					Session::set_flash('error', '登録できませんでした');
				}
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
