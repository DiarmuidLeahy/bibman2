<?php
include("../inc/functions.php");

$id = $_POST['id'];
$name = $_POST['uname'];
$old_pass = $_POST['old_password'];
$new_pass = $_POST['new_password'];

echo updateDetails($id, $name, $old_pass, $new_pass);

