<?php
// Establish a connection to the MySQL database
include('connexion.php');

// Retrieve the submitted value from the POST request
$msg = $_POST['msg'];

// Insert the data into the "data" table
$query = "INSERT INTO msg_app_for (msg) VALUES ('$msg')";
mysqli_query($conn, $query);

// Close the database connection
mysqli_close($conn);
?>