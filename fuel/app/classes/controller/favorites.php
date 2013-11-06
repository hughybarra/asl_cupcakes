<?php

class Controller_Favorites extends Controller_Template{

	public function action_index()
	{

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('favorites');

		if ( ! $data['favorite'] = Model_Favorite::find($id))
		{
			Session::set_flash('error', 'Could not find favorite #'.$id);
			Response::redirect('favorites');
		}

		$this->template->title = "Favorite";
		$this->template->content = View::forge('favorites/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Favorite::validate('create');
			
			if ($val->run())
			{
				$favorite = Model_Favorite::forge(array(
					'user_id' => Input::post('user_id'),
					'product_id' => Input::post('product_id'),
				));

				if ($favorite and $favorite->save())
				{
					Session::set_flash('success', 'Added favorite #'.$favorite->id.'.');

					Response::redirect('favorites');
				}

				else
				{
					Session::set_flash('error', 'Could not save favorite.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Favorites";
		$this->template->content = View::forge('favorites/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('favorites');

		if ( ! $favorite = Model_Favorite::find($id))
		{
			Session::set_flash('error', 'Could not find favorite #'.$id);
			Response::redirect('favorites');
		}

		$val = Model_Favorite::validate('edit');

		if ($val->run())
		{
			$favorite->user_id = Input::post('user_id');
			$favorite->product_id = Input::post('product_id');

			if ($favorite->save())
			{
				Session::set_flash('success', 'Updated favorite #' . $id);

				Response::redirect('favorites');
			}

			else
			{
				Session::set_flash('error', 'Could not update favorite #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$favorite->user_id = $val->validated('user_id');
				$favorite->product_id = $val->validated('product_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('favorite', $favorite, false);
		}

		$this->template->title = "Favorites";
		$this->template->content = View::forge('favorites/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('favorites');

		if ($favorite = Model_Favorite::find($id))
		{
			$favorite->delete();

			Session::set_flash('success', 'Deleted favorite #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete favorite #'.$id);
		}

		Response::redirect('favorites');

	}


}
