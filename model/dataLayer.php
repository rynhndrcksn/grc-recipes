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
	 * takes an Order object and saves the order to the database
	 * @param $user - User/Admin object
	 */
	function saveUser($user)
	{
		// define the query
		$sql = 'INSERT INTO orders(food, meal, condiments) VALUES (:food, :meal, :condiments)';

		// prepare the statement
		$statement = $this->_dbh->prepare($sql);

		// bind the parameters
		$statement->bindParam(':food', strtolower($order->getFood()), PDO::PARAM_STR);
		$statement->bindParam(':meal', strtolower($order->getMeal()), PDO::PARAM_STR);
		$statement->bindParam(':condiments', strtolower($order->getCondiments()), PDO::PARAM_STR);

		// execute
		$statement->execute();
		$id = $this->_dbh->lastInsertId();
	}

}