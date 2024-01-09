<?php
    // Retrieve data from the POST request from html file

    $studentName = $_POST['studentName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $grade = $_POST['grade'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

	// Create a new MySQLi connection
	$conn = new mysqli('localhost','root','','form');

	// Check if the connection to the database was successful or failed
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
	} else {
		// Prepare an SQL statement for insertion
		$stmt = $conn->prepare("insert into admission(studentName, gender, dob, grade, contactNumber, email, comment)
        values(?, ?, ?, ?, ?, ?, ?)");
		// Bind parameters to the prepared statement
		$stmt->bind_param("ssssiss", $studentName, $gender, $dob, $grade , $contactNumber, $email, $comment);
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