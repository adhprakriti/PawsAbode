<?php
// Establish connection to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adoptionform";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the input data
$stmt = $conn->prepare("INSERT INTO form_data (full_name, address, email, contact_number, occupation, queries) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $fullName, $address, $email, $contactNumber, $occupation, $queries);

// Set parameters and execute
$fullName = $_POST["fullName"];
$address = $_POST["address"];
$email = $_POST["email"];
$contactNumber = $_POST["contact"];
$occupation = $_POST["job"];
$queries = $_POST["questions"];

if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
