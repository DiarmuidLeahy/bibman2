<?php
session_start();
include("inc/connect.php");
$a=6;
$b='dev_changed';
$c=12345678;
$d=1234;
$var = updateDetails($a,$b,$c,$d);
var_dump($var);

function updateDetails($id, $uname, $old, $new) {
	global $db;

	$check_password = $db -> prepare("SELECT u.hash FROM users u WHERE u.id = ?");
	$check_password -> bindParam(1, $id);
	$check_password -> execute();
	$result = $check_password -> fetch(PDO::FETCH_ASSOC);

	if(validate($old, $result['hash'])) {

		$update_query = $db -> prepare("UPDATE users u SET u.hash = ?, u.uname = ? WHERE u.id = ?");
		$update_query -> bindParam(1, hash('md5', $old));
		$update_query -> bindParam(2, $uname);
		$update_query -> bindParam(3, $id);
		$update_query -> execute();
		return $update_query;
	} else {
		return false;
	}
}

function validate($plain, $hash) {

	$this_hash = hash('md5', $plain);
	//echo "this ".$thisHash;
	//echo "<br>that ".$hash;
	return $this_hash === $hash;
}

?>