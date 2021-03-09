<?php

/**
 * controller is our controller for the dating web app. This file contains methods that are called in our index.php
 * PHP version: 7.3
 * @author Patrick Dang & Ryan Hendrickson
 * @version https://github.com/rynhndrcksn/grc-recipes
 */
class Controller
{
	// fields
	private $_f3;
	private $_validator;
	private $_dataLayer;

	public function __construct($f3)
	{
		$this->_f3 = $f3;
		$this->_dataLayer = new DataLayer();
		$this->_validator = new Validate($this->_dataLayer);
	}

	/**
	 * displays the home.html page
	 */
	function home()
	{
		// create a new view and send the user to home.html
		$view = new Template();
		echo $view->render('views/home.html');
	}

	/**
	 * displays signup.html
	 */
	function signup()
	{
		$view = new Template();
		echo $view->render('views/signup.html');
	}

	function login()
	{
		$view = new Template();
		echo $view->render('views/login.html');
	}

}