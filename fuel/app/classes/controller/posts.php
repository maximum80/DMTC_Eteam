<?php
class Controller_Posts extends Controller_Template{

	public function action_index()
	{
		$data['posts'] = Model_Post::find('all');
		$this->template->title = "Posts";
		$this->template->content = View::forge('posts/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('posts');

		if ( ! $data['post'] = Model_Posts::find($id))
		{
			Session::set_flash('error', 'Could not find post #'.$id);
			Response::redirect('posts');
		}

		$this->template->title = "Post";
		$this->template->content = View::forge('posts/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Post::validate('create');

			if ($val->run())
			{
				$posts = Model_Post::forge(array(
					'title' => Input::post('title'),
					'body' => Input::post('body'),
					'img' => Input::post('img'),
					'user_id' => Input::post('user_id'),
					'category_id' => Input::post('category_id'),
					'deadline' => Input::post('deadline'),
					'location_longitude' => Input::post('location_longitude'),
					'location_latitude' => Input::post('location_latitude'),
				));

				if ($posts and $posts->save())
				{
					Session::set_flash('success', 'Added post #'.$posts->id.'.');
					Response::redirect('posts');
				}

				else
				{
					Session::set_flash('error', 'Could not save post.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Posts";
		$this->template->content = View::forge('posts/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('posts');

		if ( ! $post = Model_Post::find($id))
		{
			Session::set_flash('error', 'Could not find post #'.$id);
			Response::redirect('posts');
		}

		$val = Model_Post::validate('edit');

		if ($val->run())
		{
			$post->title = Input::post('title');
			$post->body = Input::post('body');
			$post->img = Input::post('img');
			$post->user_id = Input::post('user_id');
			$post->category_id = Input::post('category_id');
			$post->deadline = Input::post('deadline');
			$post->location_longitude = Input::post('location_longitude');
			$post->location_latitude = Input::post('location_latitude');

			if ($post->save()) {
				Session::set_flash('success', 'Updated post #' . $id);
				Response::redirect('posts');
			}

			else
			{
				Session::set_flash('error', 'Could not update post #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$posts->title = $val->validated('title');
				$posts->body = $val->validated('body');
				$posts->img = $val->validated('img');
				$posts->user_id = $val->validated('user_id');
				$posts->category_id = $val->validated('category_id');
				$posts->deadline = $val->validated('deadline');
				$posts->location_longitude = $val->validated('location_longitude');
				$posts->location_latitude = $val->validated('location_latitude');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('post', $post, false);
		}

		$this->template->title = "Posts";
		$this->template->content = View::forge('posts/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('posts');

		if ($posts = Model_Post::find($id))
		{
			$posts->delete();

			Session::set_flash('success', 'Deleted post #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete post #'.$id);
		}

		Response::redirect('posts');

	}


}
