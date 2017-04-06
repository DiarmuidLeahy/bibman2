<?php
include("../inc/functions.php");
<<<<<<< HEAD
=======
//echo $_POST['email'];
>>>>>>> 08220a69efcac89aef31eacc9172407cabe29c1c

echo login($_POST['email'], $_POST['password']) ? 'true' : 'false';