<?php

class Controller_Mypage extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Mypage &raquo; Index';
		$this->template->content = View::forge('mypage/index', $data);
	}

}
