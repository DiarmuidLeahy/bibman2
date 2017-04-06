<?php
include("../inc/functions.php");

echo register($_POST['email'], $_POST['password']) ? 'true' : 'false';