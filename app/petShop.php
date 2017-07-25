<?php
/**
 * Created by PhpStorm.
 * User: Chintan Karia
 * Date: 7/24/17
 */
use Animals\Cat;
use Animals\Data;
use Animals\Dog;

/**
 * Gets a data object
 *
 * @return Data
 */
function getDataObject()
{
	$pdo = new PDO(
		'sqlite:animals.sqlite'
	);
	$data = new Data($pdo);
	return $data;
}

/**
 * Create a cat and a dog and add them to the database
 */
function saveTest()
{
	logStats('create a cat with a name and insert it into the database <br>');
	$data = getDataObject();
	$cat = new Cat(['name' => 'Lunua', 'age' => 5, 'favoriteFood' => 'Chips']);
	$data->beginTransc();
	$data->insert($cat);
	if (!$data->commit()) {
		$data->rollback();
	}
	logStats('create a dog with a name and insert it into the database <br>');
	$dog = new Dog(['name' => 'Oliver', 'age' => 7, 'favoriteFood' => 'Fish']);
	$data->beginTransc();
	$data->insert($dog);
	if (!$data->commit()) {
		$data->rollback();
	}
}

/**
 * Create 3 cats and 3 dogs and add them to the database
 * @return bool
 */
function savePetShop()
{
	logStats('create three nameless cats <br>');
	logStats('create three nameless dogs <br>');
	@$objects = [
		new Cat(),
		new Cat(),
		new Cat(),
		new Dog(),
		new Dog(),
		new Dog()
	];
	logStats('Inserting all six pets into the Database <br>');
	logStats('All the pets are persisted <br>');
	$data = getDataObject();
	$data->beginTransc();
	foreach ($objects as $object) {
		if ($data->insert($object) === false) {
			return $data->rollback();
		}
	}
	return $data->commit();
}

/**
 * Prints the message
 *
 * @param null $msg
 */
function logStats($msg = null)
{
	if (is_null($msg)) {
		$msg = 'Print interesting information about the script\'s execution results to STDOUT <br>';
	}
	echo $msg;
}