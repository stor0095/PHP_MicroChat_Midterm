<?php
// Check if the correct get request has been recieved to process a new message
if(isset($_GET["newMessage"]))
{
    // Create a variable that holds the INSERT query
    $insertQuery = addslashes($_GET["newMessage"]);
    // Create PDO login credentials 
    $db_host = "localhost";
    $db_name = "midterm";
    $db_user = "root";
    $db_password = "root";
	// Connect to mySQL DB with a PDO connection
	$pdo_link = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user,$db_password);
    // Send the message into the database
    $sql= "INSERT INTO messages (`message_id`, `message_text`, `time_stamp`) VALUES (NULL, '$insertQuery', CURRENT_TIMESTAMP)";
    
    // Connect PDO to sql query
    $pdo_link->exec($sql);
    
	// Close lnkk to PDO connection
	$pdo_link = NULL;   
}
?>