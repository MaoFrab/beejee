<?php

class Controller_Admin extends Controller
{
	
	function action_index()
	{
		session_start();
		
		
		if ( $_SESSION['admin'] == "12345" )
		{
			include "application/models/Model_Post.php";

			$post = new Model_Post();
			$data = $post->get_secured_data();


			$this->view->generate('admin_view.php', 'template_view.php', $data);
		}
		else
		{
			session_destroy();
			header('Location:/login/');
		}

	}
	
	function action_logout()
	{
		session_start();
		session_destroy();
		header('Location:/');
	}

	function action_post_set_valid()
	{
		include "application/models/Model_Post.php";
		
		$id = $_POST['id'];
		$post = new Model_Post();
		if($post->set_valid($id))
			header('Location: /admin', true, 303);
	}

	function action_post_edit_get()
	{
		include "application/models/Model_Post.php";

		$id = $_POST['id'];

		$post = new Model_Post();
		$data = $post->get_one_post($id);

		$this->view->generate('admin_post_edit.php', 'template_view.php', $data);

	}

	function action_post_edit_post()
	{
		include "application/models/Model_Post.php";

		$subject = $_POST['subject'];
		$text = $_POST['text'];
		$id = $_POST['id'];

		$post = new Model_Post();
		$data = $post->update_post($id, $subject, $text);

		header('Location: /admin', true, 303);
	}

	function action_post_delete()
	{
		include "application/models/Model_Post.php";

		$id = $_POST['id'];

		$post = new Model_Post();
		$data = $post->delete_post($id);

		header('Location: /admin', true, 303);
	}

}
