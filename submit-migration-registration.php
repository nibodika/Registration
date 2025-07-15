<?php
// Database connection parameters
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "registration"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Extract form data
$fullName = $_POST['fullName'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$nationality = $_POST['nationality'];
$currentAddress = $_POST['currentAddress'];
$destinationAddress = $_POST['destinationAddress'];
$reasonForMigration = $_POST['reasonForMigration'];
$submissionDate = $_POST['submission_date']; // Ensure this matches the form field name

// Prepare an SQL statement using prepared statements
$stmt = $conn->prepare("INSERT INTO migration (full_name, dob, gender, nationality, current_address, destination_address, reason_for_migration, submission_date) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters to prevent SQL injection
$stmt->bind_param("ssssssss", $fullName, $dob, $gender, $nationality, $currentAddress, $destinationAddress, $reasonForMigration, $submissionDate);

// Execute the statement and check for errors
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
