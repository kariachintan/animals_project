<?php
/**
 * Created by PhpStorm.
 * User: Chintan Karia
 * Date: 7/24/17
 */

/* Autoload function
 */

function __autoload($class)
{
	$parts = explode('\\', $class);
	require end($parts) . '.php';
}