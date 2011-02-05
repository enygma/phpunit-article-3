<?php

/**
 * Sample class to mock against
 * 
 * @author Chris Cornutt <ccornutt@phpdeveloper.org>
 * @package phpunit-article-3
 */
class Mocking
{
	public function __construct()
	{
		// nothing to see here
	}

	/**
	 * Stub method for the "call once" tests
	 */
	public function callOnce()
	{
		return true;
	}

	/**
	 * Stub for use in a second call on the
	 * "call second" tests
	 */
	public function calledSecond()
	{
		return 'foo';
	}

	/**
	 * Simple method to add the two values given
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
	 * Stub for use with the callback test converting
	 * strings to their uppercase version
	 */
	public function strToUpper($string)
	{
		return strtoupper($string);
	}

	/**
	 * Used for testing the enforcement of the array type
	 * on the method call
	 */
	public function enforceTypes(array $number)
	{
		return true;
	}
}

?>
