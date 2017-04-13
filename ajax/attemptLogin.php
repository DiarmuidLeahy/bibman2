<?php
include("../inc/functions.php");

echo login($_POST['email'], $_POST['password']) ? 'true' : 'false';