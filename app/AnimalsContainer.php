<?php
/**
 * Created by PhpStorm.
 * * AnimalsContainer class
 * User: Chintan Karia
 * Date: 7/24/17
 */

namespace Animals;

/**
 * Class AnimalsContainer
 * @package Animals
 */
class AnimalsContainer
{
	/**
	 * Animal's name
	 *
	 * @var string
	 */
	protected $name = '';
	/**
	 * Array on animal names
	 * @var array
	 */
	protected $names = [];
	/**
	 * Animal's age
	 * @var integer
	 */
	protected $age = 0;

	/**
	 * Animal's favorite food
	 * @var string
	 */
	protected $favoriteFood = '';

	/**
	 * Speak Counter
	 * @var integer
	 */
	protected $speakCounter = 0;

	/**
	 * Constructor
	 * @param array $config
	 */
	public function __construct($config = [])
	{
		if (!empty($config)) {
			$this->setName((@$config['name']));
			$this->setAge(@$config['age']);
			$this->setFavoriteFood(@$config['favoriteFood']);
		}
	}

	/**
	 * Setter method for the Animal's name
	 *
	 * @param string $name
	 * @return AnimalsContainer
	 */
	public function setName($name)
	{
		$this->name = $name;
		if (strlen($name) > 0) {
			$this->names[] = $this->name;
		}
		return $this;
	}

	/**
	 * Getter method for the animal's name
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Gets all the names for an animal in a single comma-separated string
	 * @return string
	 */
	public function getNames()
	{
		return implode(',', $this->names);
	}

	/**
	 * Calculates the average length of all the animal's names
	 *
	 * @return float or int
	 */
	public function getAverageNameLength()
	{
		$count = count($this->names);
		if ($count === 0) {
			return 0;
		}
		$totalLength = 0;
		foreach ($this->names as $name) {
			$totalLength += strlen($name);
		}
		return $totalLength / $count;
	}

	/**
	 * Setter method for the animal's age
	 *
	 * @param int $age
	 * @return AnimalsContainer (optionally throws exception)
	 *
	 */
	public function setAge($age = null)
	{
		if (is_null($age)) {
			trigger_error('No age has been set', E_USER_WARNING);
		} elseif (!is_int($age)) {
			throw new \Exception('The animal\'s age must be an integer');
		} elseif ($age < 0) {
			throw new \Exception('The animal\'s age must be a positive value');
		}
		$this->age = (int)$age;
		return $this;
	}

	/**
	 * Getter method for the animal's age
	 * @return int
	 */
	public function getAge()
	{
		return $this->age;
	}

	/**
	 * Speak method to vomit out what the animal speaks
	 * Animal’s age increases by 1 every five times it speaks
	 * @param string word
	 * @return AnimalsContainer (optionally throws exception)
	 *
	 */
	public function speak($word = '')
	{
		$this->speakCounter++;

		if (!is_string($word) || empty($word)) {
			throw new \Exception('arg $word is not valid');
		}

		echo $word;

		if ($this->speakCounter % 5 == 0) {
			$this->age++;
		}

		return $this;
	}

	/**
	 * Setter method for the animal's favorite food
	 *
	 * @param string $favoriteFood
	 * @return AnimalAbstract
	 */
	public function setFavoriteFood($favoriteFood)
	{
		if (strlen($favoriteFood) > 0 && !is_string($favoriteFood)) {
			throw new \Exception('arg $favoriteFood is not valid');
		} elseif (strlen($favoriteFood) > 32) {
			throw new \Exception('arg $favoriteFood is too long');
		}
		$this->favoriteFood = (string)$favoriteFood;
		return $this;
	}

	/**
	 * Getter method for the animal's favorite food
	 * @return string
	 */
	public function getFavoriteFood()
	{
		return (string)$this->favoriteFood;
	}
}