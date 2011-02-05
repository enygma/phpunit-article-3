<?php

include_once('/Users/enygma/work/writing/phpunit-article-3/app/CustomException.php');

class Annotations
{

	/**
	 * @assert (1,2) == 3 
	 * @group bugfix
	 * @testdox
	 *
	 */
	public function addValues($a,$b)
	{
		return $a+$b;
	}

	public function willThrowException()
	{
		throw new CustomException('failing is fun',5);
	}

}

?>
