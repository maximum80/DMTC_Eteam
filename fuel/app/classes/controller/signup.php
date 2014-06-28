<?php

class Controller_Signup extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Signup &raquo; Index';
		$this->template->content = View::forge('signup/index', $data);
	}

	public function action_confirm()
	{
		$data["subnav"] = array('confirm'=> 'active' );
		$this->template->title = 'Signup &raquo; Confirm';
		$this->template->content = View::forge('signup/confirm', $data);
	}

}
