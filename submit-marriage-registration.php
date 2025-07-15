<?php
// Database connection parameters
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "registration"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Extract form data
$husbandFirstName = $_POST['husbandfn'];
$husbandLastName = $_POST['husbandln'];
$husbandDOB = $_POST['husbandDOB'];
$husbandEmail = $_POST['husbandEmail'];
$husbandPhone = $_POST['husbandPhone'];
$husbandAddress = $_POST['husbandaddress'];
$wifeFirstName = $_POST['wifefn'];
$wifeLastName = $_POST['wifeln'];
$wifeDOB = $_POST['wifeDOB'];
$wifeEmail = $_POST['wifeEmail'];
$wifePhone = $_POST['wifePhone'];
$wifeAddress = $_POST['wifeaddress'];
$marriageDate = $_POST['marriageDate'];
$location = $_POST['location'];
$witness1FullName = $_POST['witness1'];
$witness2FullName = $_POST['witness2'];
$submissionDate = $_POST['submission_date'];

// Prepare SQL statement to insert form data into the table (replace 'marriage_table' with your actual table name)
$sql = "INSERT INTO marriage (husband_first_name, husband_last_name, husband_dob, husband_email, husband_phone, husband_address, wife_first_name, wife_last_name, wife_dob, wife_email, wife_phone, wife_address, marriage_date, location, witness1_full_name, witness2_full_name, submission_date) 
        VALUES ('$husbandFirstName', '$husbandLastName', '$husbandDOB', '$husbandEmail', '$husbandPhone', '$husbandAddress', '$wifeFirstName', '$wifeLastName', '$wifeDOB', '$wifeEmail', '$wifePhone', '$wifeAddress', '$marriageDate', '$location', '$witness1FullName', '$witness2FullName', '$submissionDate')";

if (mysqli_query($conn, $sql)) 
{
    echo "New record created successfully";
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
