<?php
class Controller_Users extends Controller_Template{

	public function action_index()
	{
		$data['users'] = Model_User::find('all');
		$this->template->title = "Users";
		$this->template->content = View::forge('users/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('users');

		if ( ! $data['user'] = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('users');
		}

		$this->template->title = "User";
		$this->template->content = View::forge('users/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');
			
			if ($val->run())
			{
				$user = Model_User::forge(array(
					'user_name' => Input::post('user_name'),
					'user_email' => Input::post('user_email'),
					'user_pass' => Input::post('user_pass'),
				));

				if ($user and $user->save())
				{
					Session::set_flash('success', 'Added user #'.$user->id.'.');

					Response::redirect('users');
				}

				else
				{
					Session::set_flash('error', 'Could not save user.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('users/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('users');

		if ( ! $user = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('users');
		}

		$val = Model_User::validate('edit');

		if ($val->run())
		{
			$user->user_name = Input::post('user_name');
			$user->user_email = Input::post('user_email');
			$user->user_pass = Input::post('user_pass');

			if ($user->save())
			{
				Session::set_flash('success', 'Updated user #' . $id);

				Response::redirect('users');
			}

			else
			{
				Session::set_flash('error', 'Could not update user #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user->user_name = $val->validated('user_name');
				$user->user_email = $val->validated('user_email');
				$user->user_pass = $val->validated('user_pass');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('users/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('users');

		if ($user = Model_User::find($id))
		{
			$user->delete();

			Session::set_flash('success', 'Deleted user #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete user #'.$id);
		}

		Response::redirect('users');

	}


}
