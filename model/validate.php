<?php
/**
 * @author Patrick Dang & Ryan Hendrickson
 * @file model/validate.php
 * @version https://github.com/rynhndrcksn/grc-recipes
 * handles all of our validation functions for recipes app
 */

class Validate
{
	// fields
	private $_dataLayer;

	function __construct($dataLayer)
	{
		$this->_dataLayer = $dataLayer;
	}

	/**
	 * returns true if not empty and contains only letters
	 * @param $food
	 * @return bool
	 */
	function validFood($food): bool
	{
		return !empty($this->prep_input($food)) && ctype_alpha($this->prep_input($food));
	}

	/**
	 * takes a parameter, strips any white spaces, strips \\'s and //'s, and converts any HTML to it's ASCII code.
	 * is used on its own, but also acts as a helper function
	 * @param $data
	 * @return string
	 */
	function prep_input($data): string
	{
		$data = strtolower($data);
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}