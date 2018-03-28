<?php
$hostname = "sql.njit.edu";
$username = "ba286";
$password = "XuB2AyNAz";
$dbName = "ba286";
$conn = NULL;
try 
{
    $conn = new PDO("mysql:host=$hostname;dbname=$dbName",
    $username, $password);
    echo 'Connected Successfully'.'<br>';
}
catch(PDOException $e)
{
	// echo "Connection failed: " . $e->getMessage();
	http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
}

// Runs SQL query and returns results (if valid)
function runQuery($query) {
	global $conn;
    try {
		$q = $conn->prepare($query);
		$q->execute();
		$results = $q->fetchAll();
		$q->closeCursor();
		return $results;	
	} catch (PDOException $e) {
		http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
	}	  
}

function http_error($message) 
{
	header("Content-type: text/plain");
	die($message);
}
?>