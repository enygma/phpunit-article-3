<?php

include_once('/Users/enygma/work/writing/phpunit-article-3/app/CustomException.php');

/**
 * Simple class for testing PHPUnit annotations
 *
 * @author Chris Cornutt <ccornutt@phpdeveloper.org>
 * @package phpunit-article-3
 */
class Annotations
{

	/**
	 * Simple addition method
	 *
	 * @assert (1,2) == 3 
	 * @group bugfix
	 * @testdox
	 *
	 * @param integer $a Number #1
	 * @param integer $b Number #2
	 * @return integer
	 */
	public function addValues($a,$b)
	{
		return $a+$b;
	}

	/**
	 * Method that throws one of our custom exceptions
	 */
	public function willThrowException()
	{
		throw new CustomException('failing is fun',5);
	}

}

?>
