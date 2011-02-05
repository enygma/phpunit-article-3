<?php

/**
 * A custom exception that can be used in the testing
 * Nothing fancy, just a shel
 *
 * @author Chris Cornutt <ccornutt@phpdeveloper.org>
 * @package phpunit-article-3
 */
class CustomException extends Exception 
{

	public function __construct($message, $code = 0, Exception $previous = null) {

		// just pass it on through for now...
		parent::__construct($message, $code, $previous);
	}

}

?>
