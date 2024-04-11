<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "paws-abode";

// Create a connection
$conn = new mysqli($servername, $username, $password);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the database exists
$query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database'";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    $createDatabaseQuery = "CREATE DATABASE $database";
    if ($conn->query($createDatabaseQuery) === TRUE) {
        echo "Database created successfully<br>";

        $conn->select_db($database); // Select the newly created database

        $createTableQuery = "
            CREATE TABLE UserData (
                id INT AUTO_INCREMENT PRIMARY KEY,
                fullname VARCHAR(255),
                address VARCHAR(255),
                email VARCHAR(255),
                contact INT,
                job VARCHAR(255),
                queries VARCHAR(255),
            )";

        if ($conn->query($createTableQuery) === TRUE) {
            echo "Table 'weather_data' created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } else {
        echo "Error creating database: " . $conn->error;
    }
} else {
    echo "Database already exists";
}

?>