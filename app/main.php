<?php
/**
 * Created by PhpStorm.
 * User: Chintan Karia
 * Date: 7/24/17
 */
// Including the autoloader file.
include_once('autoload.php');
// Including the petShop file
include 'petShop.php';

use Animals\Cat as Cat;
use Animals\Dog as Dog;

// Create an object of Cat class.
$cat = new Cat();
printf("Name is currently %s<br>", $cat->getName());
// Settting the name to Garfield
$cat->setName("Garfield");
printf("Name has been changed to %s<br>", $cat->getName());
echo PHP_EOL;

// Create an object of Dog class.
$dog = new Dog();
printf("Name is currently %s<br>", $dog->getName());

// Setting the name to Tommy
$dog->setName("Tommy");
printf("Name has been changed to %s<br>", $dog->getName());
echo PHP_EOL;

// Save animals to database.
saveTest();

// Create 3 cats and 3 dogs and add them to the database
savePetShop();

// Message Logger
logStats();
logStats('Done!');