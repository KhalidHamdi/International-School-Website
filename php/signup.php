<?php
    // Retrieve data from the POST request from html file
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Create a new MySQLi connection
    $conn = new mysqli('localhost', 'root','', 'form');

    // Check if the connection to the database was successful or failed
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
	} else {
        // Prepare an SQL statement for insertion
		$stmt = $conn->prepare("insert into signup(username,email,password)
        values(?, ?, ?)");
        // Bind parameters to the prepared statement
		$stmt->bind_param("sss", $username, $email , $password);
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