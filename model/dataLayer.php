<?php

/**
 * @author Patrick Dang & Ryan Hendrickson
 * @file model/data-layer.php
 * @version https://github.com/rynhndrcksn/grc-recipes
 * data-layer.php is just our model class that does all the heavy lifting for us, it will eventually reach our to our
 * DB but for now it kinda does nothing.
 */

class DataLayer
{
	// fields
	private $_dbh;

	function __construct($dbh=null) {
		$this->_dbh = $dbh;
	}

	/**
	 * takes an User object and saves the user to the database
	 * @param $user - User/Admin object
	 */
	function saveUser($user)
	{
		// define the query
		$sql = 'INSERT INTO users(first, last, email, username, password) VALUES (:first, :last, :email, :username, :password)';

		// prepare the statement
		$statement = $this->_dbh->prepare($sql);

		// bind the parameters
		$statement->bindParam(':first', strtolower($user->getFirst()), PDO::PARAM_STR);
		$statement->bindParam(':last', strtolower($user->getLast()), PDO::PARAM_STR);
		$statement->bindParam(':email', strtolower($user->getEmail()), PDO::PARAM_STR);
		$statement->bindParam(':username', strtolower($user->getUsername()), PDO::PARAM_STR);
		$statement->bindParam(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);

		// execute
		$statement->execute();
	}

}