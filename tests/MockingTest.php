<?php

require_once '/Users/enygma/work/writing/phpunit-article-3/app/Mocking.php';

class MockingTest extends PHPUnit_Framework_TestCase
{
	private $_mock	= null;

	/**
	 * Set up before test
	 */
	public function setUp()
	{
		$this->_mock = new Mocking();
	}

	/**
	 * Tear down after test
	 */
	public function tearDown()
	{
		unset($this->_mock);
	}

	/**
	 * Create a standardized mock object
	 * (could be useful for mocking something like web services...)
	 */
	private function getMockStandard()
	{
		$stub = $this->getMock('Mocking',array(
			'callOnce'
		));
		$stub->expects($this->any())
			->method('callOnce')
			->will($this->returnValue(true));
		
		return $stub;
	}
	
	//---------------

	/**
	 * Test to ensure that a method is called at least once
	 */
	public function  testMockMethodIsCalled()
	{
		$mock = $this->getMock('Mocking',array('callOnce'));
		$mock->expects($this->once())
			->method('callOnce');

		$mock->callOnce();
	}
	
	/**
	 * Test the use of the MockBuilder to test the "calledSecond"
	 * response
	 */
	public function testUsesMockBuilder()
	{
		$stub = $this->getMockBuilder('Mocking')
			->setMethods(array(
				'calledSecond'
			))
			->getMock();

		$stub->expects($this->any())
			->method('calledSecond')
			->will($this->returnValue('foo'));

		$this->assertEquals('foo',$stub->calledSecond());
	}

	/**
	 * Test the mocked "addValues" method to return the correct 
	 * added values (uses returnValue)
	 */
	public function testMockedAddition()
	{
		$stub = $this->getMock('Mocking',array('addValues'));
		$stub->expects($this->once())
			->method('addValues')
			->will($this->returnValue(3));

		$this->assertEquals(3,$stub->addValues(1,2));
	}

	/**
	 * Test the return of the "strToUpper" method's results based on
	 * a callback to the PHP function "strtoupper"
	 */
	public function testMockedAdditionCallback()
	{
		$stub = $this->getMock('Mocking',array('strToUpper'));
		$stub->expects($this->any())
			->method('strToUpper')
			->will($this->returnCallback('strtoupper'));

		$this->assertEquals('FOO',$stub->strToUpper('foo'));
	}

	/**
	 * Test a call to another non-mocked method on a mock object
	 * Mocked "callOnce", call "calledSecond"
	 */
	public function testNonMockedMethod()
	{
		$stub = $this->getMock('Mocking',array('callOnce'));
		$stub->expects($this->once())
			->method('callOnce')
			->will($this->returnValue(true));

		$stub->callOnce();

		$this->assertEquals('foo',$stub->calledSecond());
	}

	/**
	 * Test the mocking of a method that doesn't exist 
	 * The return value is NULL, but no error is thrown
	 */
	public function testBadMockedMethod()
	{
		$stub = $this->getMock('Mocked',array('callBad'));
		$stub->expects($this->any())
			->method('callBad')
			->will($this->returnValue(null));

		$this->assertNull($stub->callBad());
	}

	/**
	 * Testing enforcing the type to "array" like the "enforceTypes"
	 * method does via type hinting
	 */
	public function testTypesAreEnorced()
	{
		$stub = $this->getMock('Mocked',array('enforceTypes'));
		$stub->expects($this->any())
			->method('enforceTypes')
			->with($this->isType('array'));

		$this->assertTrue($stub->enforceTypes('bad call'));

	}
}

?>
