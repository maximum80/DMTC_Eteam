<?php

class Controller_Mypage extends Controller_Template
{

	public function action_index()
	{
    $data['posts'] = Model_User::find('all');
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Mypage';
		$this->template->content = View::forge('mypage/index', $data);
	}

}
