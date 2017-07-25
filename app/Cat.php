<?php
/**
 * Created by PhpStorm.
 * User: Chintan Karia
 * Date: 7/24/17
 */

namespace Animals;

require_once('AnimalsContainer.php');

class Cat extends AnimalsContainer
{
	/**
	 * Constructor
	 * @param array $config
	 */
	public function __construct($config = [])
	{
		if (!isset($config['age']) || strlen($config['age']) === 0) {
			$config['age'] = rand(5, 10);
		}
		return parent::__construct($config);
	}

	/**
	 * Speak method to vomit out what the animal speaks
	 * @param string $word
	 */
	public function speak($word = '')
	{
		if (strlen($word) === 0) {
			$word = 'meow';
		}
		return parent::speak($word);
	}
}