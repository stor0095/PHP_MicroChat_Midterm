<?php
// Check if the correct get request has been recieved signaling what message number to start the selection from
if(isset($_GET["getMessagesAfterLine"]))
{
	// Create PDO login credentials 
    $db_host = "localhost";
    $db_name = "midterm";
    $db_user = "root";
    $db_password = "root";
	// Connect to mySQL DB with a PDO connection
	$pdo_link = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user,$db_password);
    // Query the DB with the SELECT query and store the results
	$sqlQuery = "SELECT * FROM messages";
	$result = $pdo_link->query($sqlQuery);
	// Check if the results is set to something
    $res = $result->fetchAll(PDO::FETCH_NUM);	
	// echo the response text to the user
	echo json_encode($res);
    // Close link to PDO connection
    $pdo_link = NULL;
}
?>
