<?php

class Model
{
	public function get_data()
	{
		
	}

	public function setConnection()
	{
		$user = "root";
		$pass = "";
		$dbh = new PDO('mysql:host=localhost;dbname=beejee', $user, $pass);

		return $dbh;
	}


}