<?php
/**
 * Created by PhpStorm.
 * User: Chintan Karia
 * Date: 7/24/17
 */

namespace Animals;

require_once('AnimalsContainer.php');

class Dog extends AnimalsContainer
{
	/**
	 * Constructor
	 * @param array $config
	 */
	public function __construct($config = [])
	{
		if (!isset($config['age']) || empty($config['age'])) {
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
		if (empty($word)) {
			$word = 'woof';
		}
		return parent::speak($word);
	}
}