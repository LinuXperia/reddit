<?php

$db = mysqli_connect('localhost', 'root', '', 'reddit');
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>