<?php
/**
 * Created by PhpStorm.
 * User: Chintan Karia
 * Date: 7/24/17
 */

require '../app/AnimalsContainer.php';
use PHPUnit\Framework\TestCase;

class AnimalsContainerTest extends TestCase
{

	protected static $stub;

	public function setUp()
	{
		self::$stub = $this->getMockForAbstractClass('\Animals\AnimalsContainer');
	}

	public function testSetterGetterName()
	{
		$stub = self::$stub;
		$name = 'Kitty';
		$stub->setName($name);
		$actual = $stub->getName();
		$this->assertEquals($name, $actual);
	}

	public function testSetterGetterAge()
	{
		$stub = self::$stub;
		$age = 8;
		$stub->setAge($age);
		$actual = $stub->getAge();
		$this->assertEquals($age, $actual);
	}

	public function testNameHistory()
	{
		$stub = self::$stub;
		$names = ['Bella', 'Chole'];
		foreach ($names as $name) {
			$stub->setName($name);
		}
		$expected = implode(',', $names);
		$actual = $stub->getNames();
		$this->assertEquals($expected, $actual);
	}

	public function testAverageNameLength()
	{
		$stub = self::$stub;
		$names = ['Millo', 'Oreo', 'Pepper', 'Charlie', 'Jack', 'Peanut'];
		$totalLength = 0;
		foreach ($names as $name) {
			$stub->setName($name);
			$totalLength += strlen($name);
		}
		$expected = $totalLength / count($names);
		$actual = $stub->getAverageNameLength();
		$this->assertEquals($expected, $actual);
	}

	public function testSpeakSomething()
	{
		$stub = self::$stub;
		$string = 'something';
		$this->expectOutputString($string);
		$stub->speak($string);
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage arg $word is not valid
	 */
	public function testExceptionSpeakIsEmpty()
	{
		$stub = self::$stub;
		$stub->speak('');
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage The animal's age must be an integer
	 */
	public function testExceptionAgeNotInteger()
	{
		$stub = self::$stub;
		$stub->setAge('one');
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage The animal's age must be a positive value
	 */
	public function testExceptionAgeNotPositive()
	{
		$stub = self::$stub;
		$stub->setAge(-10);
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage arg $favoriteFood is not valid
	 */
	public function testExceptionFavoriteFoodNotString()
	{
		$stub = self::$stub;
		$stub->setFavoriteFood(true);
	}

	public function testSetterGetterFavoriteFood()
	{
		$stub = self::$stub;
		$food = 'Pasta';
		$stub->setFavoriteFood($food);
		$actual = $stub->getFavoriteFood();
		$this->assertEquals($food, $actual);
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage arg $favoriteFood is too long
	 */
	public function testExceptionFavoriteFoodTooLong()
	{
		$stub = self::$stub;
		$string = 'Pasta';
		while (strlen($string) <= 33) {
			$string .= $string;
		}
		$stub->setFavoriteFood($string);
	}

	public function testSetGetFavoriteFood()
	{
		$stub = self::$stub;
		$food = 'Pasta';
		$stub->setFavoriteFood($food);
		$actual = $stub->getFavoriteFood();
		$this->assertEquals($food, $actual);
	}
}
