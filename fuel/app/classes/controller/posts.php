<?php

class Controller_Posts extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Posts &raquo; Index';
		$this->template->content = View::forge('posts/index', $data);
	}

	public function action_add()
	{
		$data["subnav"] = array('add'=> 'active' );
		$this->template->title = 'Posts &raquo; Add';
		$this->template->content = View::forge('posts/add', $data);
	}

	public function action_confirm()
	{
		$data["subnav"] = array('confirm'=> 'active' );
		$this->template->title = 'Posts &raquo; Confirm';
		$this->template->content = View::forge('posts/confirm', $data);
	}

	public function action_detail()
	{
		$data["subnav"] = array('detail'=> 'active' );
		$this->template->title = 'Posts &raquo; Detail';
		$this->template->content = View::forge('posts/detail', $data);
	}

	public function action_complete()
	{
		$data["subnav"] = array('complete'=> 'active' );
		$this->template->title = 'Posts &raquo; Complete';
		$this->template->content = View::forge('posts/complete', $data);
	}

}
