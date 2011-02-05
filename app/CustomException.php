<?php

class CustomException extends Exception 
{

	public function __construct($message, $code = 0, Exception $previous = null) {

		// just pass it on through for now...
		parent::__construct($message, $code, $previous);
	}

}

?>
