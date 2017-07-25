<?php
/**
 * Created by PhpStorm.
 * User: Chintan Karia
 * Date: 7/24/17
 *
 */
require '../app/Cat.php';
use PHPUnit\Framework\TestCase;
use Animals\Cat as Cat;

class CatsTest extends TestCase
{

	protected static $stub;

	public function setUp()
	{
		self::$stub = $this->getMockForAbstractClass('\Animals\Cat');
	}

	public function testCatInitialBetween5and10()
	{
		$result = true;
		for ($i = 0; $i < 100; $i++) {
			@$cat = new Cat();
			//Initial age is 7
			$cat->setAge(7);
			if ($cat->getAge() <= 5 || $cat->getAge() >= 10) {
				$result = false;
				break;
			}
		}
		$this->assertTrue($result, 'Cat age is not between 5 and 10');
	}

	public function testCatInitialNotBetween5and10()
	{
		$result = true;
		for ($i = 0; $i < 100; $i++) {
			@$cat = new Cat();
			//Initial age is 7
			$cat->setAge(12);
			if ($cat->getAge() <= 5 || $cat->getAge() >= 10) {
				$result = false;
				break;
			}
		}
		$this->assertFalse($result, 'Cat age is not between 5 and 10');
	}

	public function testCatName()
	{
		$stub = self::$stub;
		$string = $stub->getName();
		$this->assertEmpty($string);
		$name = 'Pepper';
		$stub->setName($name);
		$this->assertEquals($stub->getName(), $name);
	}

	public function testCheckCatAge()
	{
		@$cat = new Cat();
		$string = $cat->getName();
		$this->assertEmpty($string);
		$age = rand(1, 20);
		$cat->setAge($age);
		$this->assertEquals($cat->getAge(), $age);
	}

	public function testCatCanSayHello()
	{
		@$cat = new Cat();
		$word = 'hello';
		$this->expectOutputString($word);
		$cat->speak($word);
	}

	public function testGiveCatBirthNameAge()
	{
		$name = 'Garfield';
		$age = 0;
		$cat = new Cat(compact('name', 'age'));
		$this->assertEquals($name, $cat->getName());
		$this->assertEquals($age, $cat->getAge());
	}

	public function testManyNamesAndAverageNameLength()
	{
		@$cat = new Cat();
		$names = ['Millo', 'Oreo', 'Pepper', 'Charlie', 'Jack', 'Peanut'];
		$totalLength = 0;
		foreach ($names as $name) {
			$cat->setName($name);
			$totalLength += strlen($name);
		}
		$allNames = $cat->getNames();
		$this->assertEquals(implode(',', $names), $allNames);
		$this->assertEquals($totalLength / count($names), $cat->getAverageNameLength());
	}

	public function testAgeIncreasesByOne()
	{

		@$cat = new Cat();
		$currentAge = $cat->getAge();
		for ($i = 0; $i < 5; $i++) {
			$cat->speak();
		}

		$newAge = $cat->getAge();
		$this->assertEquals($newAge, $currentAge + 1);

		$this->assertNotEquals($newAge, $currentAge);
	}
}
