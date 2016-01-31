<?php

class Model_Post extends Model
{
	
	public function get_data()
	{
		$dbh = $this->setConnection();

		$stmt = $dbh->prepare('SELECT * from post as p WHERE p.is_valid = true ORDER BY p.date DESC');

		$data = array();
		if ($stmt->execute()) {
			while ($row = $stmt->fetch()) {
				$data[] = $row;
			}
		}
		
		return $data;
	}

	public function get_secured_data()
	{
		$dbh = $this->setConnection();

		$statement = $dbh->prepare('SELECT * from post as p ORDER BY p.date DESC');

		$data = array();
		if ($statement->execute()) {
			while ($row = $statement->fetch()) {
				$data[] = $row;
			}
		}
		
		return $data;
	}

	public function get_one_post($id)
	{
		$dbh = $this->setConnection();

		try {
			$statement = $dbh->prepare('SELECT * from post as p WHERE id = :id ORDER BY p.date DESC');
			$statement->bindValue("id", $id);
			
			if($statement->execute())
				$data = $statement->fetch();
			else return "Data not found";
		}
		catch(Exception $e) {
			return $e->getMessage();
		}
		
		return $data;
	}

	public function set_post($email, $username, $subject, $text) 
	{
		$dbh = $this->setConnection();

		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');

		$statement = $dbh->prepare("INSERT INTO post(email, username, subject, text, date, is_valid) VALUES(:email, :username, :subject, :text, :date, false)");
		$statement->bindValue("email", $email);
		$statement->bindValue("username", $username);
		$statement->bindValue("subject", $subject);
		$statement->bindValue("text", $text);
		$statement->bindValue("date", $date);

		$statement->execute();

		return true;
	}

	public function set_valid($id)
	{
		$dbh = $this->setConnection();

		$data = $this->get_one_post($id);
		if($data['is_valid'] == true)
			$is_valid = 0;
		else $is_valid = 1;

		

		try {
			$statement = $dbh->prepare("UPDATE post SET is_valid=:is_valid WHERE id = :id");
			$statement->bindValue("is_valid", $is_valid);
			$statement->bindValue("id", $id);
			$statement->execute();
		}
		catch(Exception $e) {
			return $e->getMessage();
		}

		return true;
	}

	public function update_post($id, $subject, $text)
	{
		$dbh = $this->setConnection();

		try {
			$statement = $dbh->prepare("UPDATE post SET subject=:subject, text=:text WHERE id = :id");
			$statement->bindValue("subject", $subject);
			$statement->bindValue("text", $text);
			$statement->bindValue("id", $id);
			$statement->execute();
		}
		catch(Exception $e) {
			return $e->getMessage();
		}

		return true;
	}

	public function delete_post($id)
	{
		$dbh = $this->setConnection();

		try {
			$statement = $dbh->prepare("DELETE FROM post WHERE id = :id");
			$statement->bindValue("id", $id);
			$statement->execute();
		}
		catch(Exception $e) {
			return $e->getMessage();
		}

		return true;
	}

}
