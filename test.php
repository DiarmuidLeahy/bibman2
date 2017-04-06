<?php
<<<<<<< HEAD
include("inc/connect.php");

//include("inc/functions.php");

// register("derri", "headrush");
// $test = 5.3;
// var_dump($test);
//var_dump(login('three','33333333'));

function create_trash($user_id) {

	global $db;

	$q = $db -> prepare("CREATE TABLE IF NOT EXISTS folders(
	  	id INT(11) NOT NULL AUTO_INCREMENT,
	  	name VARCHAR(45) DEFAULT NULL,
	  	user_id INT(10),
	  	PRIMARY KEY (id))");

	$q -> execute();

	$insert = $db -> prepare("INSERT INTO folders(")

}

create_trash(123);
=======


include("inc/functions.php");

// register("derri", "headrush");


//var_dump(login('three','33333333'));
>>>>>>> 08220a69efcac89aef31eacc9172407cabe29c1c
?>