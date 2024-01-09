<?php
    // Retrieve data from the POST request from html file
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Create a new MySQLi connection
    $conn = new mysqli('localhost', 'root','', 'form');

	// Check if the connection to the database was successful or failed
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
	} else {
		// Prepare an SQL statement for insertion
		$stmt = $conn->prepare("insert into contact(name,email,message)
        values(?, ?, ?)");
		// Bind parameters to the prepared statement
		$stmt->bind_param("sss", $name, $email, $message);
		// Execute the prepared statement
		$execval = $stmt->execute();
		// Output a success message for registration
		echo "Registration successfully...";
		// Close the prepared statement 
		$stmt->close();
		// Close the database connection
		$conn->close();
	}
?>