<?php

class Mocking
{

	public function __construct()
	{

	}

	public function callOnce()
	{
		return true;
	}
	public function calledSecond()
	{
		return 'foo';
	}
	public function addValues($a,$b)
	{
		return $a+$b;
	}
	public function strToUpper($string)
	{
		return strtoupper($string);
	}
	public function enforceTypes(array $number)
	{
		return true;
	}
}

?>
