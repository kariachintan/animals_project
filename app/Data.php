<?php
/**
 * Created by PhpStorm.
 * User: Chintan Karia
 * Date: 7/24/17
 */

namespace Animals;
use PDO;
class Data
{
	/**
	 * Database object
	 * @var object
	 */
	protected $db;
	/**
	 * Constructor
	 * @param PDO $db
	 */
	public function __construct(PDO $db)
	{
		$this->db = $db;
	}
	/**
	 * Insert method for the inserting animals in to the databse
	 * @param object of the animal class
	 */
	public function insert(\Animals\AnimalsContainer $object)
	{
		if (get_class($object) === 'Animals\Cat') {
			$animal = 'cats';
		} elseif (get_class($object) === 'Animals\Dog') {
			$animal = 'dogs';
		} else {
			throw new \Exception('Animal unknown (' . get_class($object));
		}
		$sql = sprintf('INSERT INTO `animals` (`animal_type`,`name`,`age`) VALUES (\'%s\', \'%s\', \'%s\');',
			$animal, $object->getName(), $object->getAge());
		$statement = $this->db->prepare($sql);
		return $statement instanceof \PDOStatement ? $statement->execute() : false;
	}
	/**
	 * Beginning a transaction
	 */
	public function beginTransc()
	{
		echo "Beginning a transaction<br>";
		if (!$this->db->beginTransaction()) {
			throw new \Exception('Beginning a transaction failed');
		}
		return $this;
	}
	/**
	 * Committing transaction
	 */
	public function commit()
	{
		echo "Committing transaction<br>";
		return $this->db->commit();
	}
	/**
	 * Rolling back transaction
	 */
	public function rollback()
	{
		echo "Rolling back transaction<br>";
		return $this->db->rollback();
	}
}