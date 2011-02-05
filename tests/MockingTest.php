<?php

require_once '/Users/enygma/work/writing/phpunit-article-3/app/Mocking.php';

class MockingTest extends PHPUnit_Framework_TestCase
{
	private $_mock	= null;

	public function setUp()
	{
		$this->_mock = new Mocking();
	}

	public function tearDown()
	{
		unset($this->_mock);
	}

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

	public function  testMockMethodIsCalled()
	{
		$mock = $this->getMock('Mocking',array('callOnce'));
		$mock->expects($this->once())
			->method('callOnce');

		$mock->callOnce();
	}
	
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

	public function testMockedAddition()
	{
		$stub = $this->getMock('Mocking',array('addValues'));
		$stub->expects($this->once())
			->method('addValues')
			->will($this->returnValue(3));

		$this->assertEquals(3,$stub->addValues(1,2));
	}

	public function testMockedAdditionCallback()
	{
		$stub = $this->getMock('Mocking',array('strToUpper'));
		$stub->expects($this->any())
			->method('strToUpper')
			->will($this->returnCallback('strtoupper'));

		$this->assertEquals('FOO',$stub->strToUpper('foo'));
	}

	public function testNonMockedMethod()
	{
		$stub = $this->getMock('Mocking',array('callOnce'));
		$stub->expects($this->once())
			->method('callOnce')
			->will($this->returnValue(true));

		$stub->callOnce();

		$this->assertEquals('foo',$stub->calledSecond());
	}

	public function testBadMockedMethod()
	{
		$stub = $this->getMock('Mocked',array('callBad'));
		$stub->expects($this->any())
			->method('callBad')
			->will($this->returnValue(null));

		$stub->callBad();
	}

}

?>
