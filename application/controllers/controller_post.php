<?php

class Controller_Post extends Controller
{

	function __construct()
	{

		$this->model = new Model_Post();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();
		//echo var_dump($data);
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}

	function action_create_post()
	{
		$email = $_POST['email'];
		$username = $_POST['username'];
		$subject = $_POST['subject'];
		$text = $_POST['text'];
		$this->model->set_post($email, $username, $subject, $text);
		header('Location: /post', true, 303);
	}
}