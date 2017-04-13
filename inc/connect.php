<?php
try {
	$user = 'root';
	$pass = '';
    $db = new PDO('mysql:host=localhost;dbname=bibman', $user, $pass);
    
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


// PHP Data Objects(PDO) Sample Code:
/*
try {
    $conn = new PDO("sqlsrv:server = tcp:bibmanserver.database.windows.net,1433; Database = bibDB", "fzd0773", "{your_password_here}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
*/