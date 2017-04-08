<?php

include("inc/connect.php");

//include("inc/functions.php");

// register("derri", "headrush");
// $test = 5.3;
// var_dump($test);
//var_dump(login('three','33333333'));

// $check_for_trash = $db -> prepare("SELECT f.id FROM folders f WHERE f.name = ? LIMIT 1");
// 	$check_for_trash -> bindValue(1, 'trash');
// 	$check_for_trash -> execute();
// 	$result = $check_for_trash -> fetch(PDO::FETCH_ASSOC);

// 	if(isset($result['id'])) {
// 		echo 'hey!';
// 		var_dump($result);
// 	} else {
// 		echo 'there';
// 	}

session_start();
var_dump($_SESSION);

// include("inc/functions.php");

// register("derri", "headrush");


?>