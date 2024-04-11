<?php
// import the database.php to create database if not exist
include "database.php";

$servername = "localhost";
$username = "root";
$password = "";
$database = "paws-abode";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    echo "Sorry, we failed to connect";
} else {
    try {
        mysqli_select_db($conn, $database);

        // Get the data from the request body
        $data = json_decode(file_get_contents("php://input"));

        // Validate the data
        if (
            !isset($data->fullname) ||
            !isset($data->address) ||
            !isset($data->email) ||
            !isset($data->contact) ||
            !isset($data->job) ||
            !isset($data->queries)

        ) {
            http_response_code(400); // Bad Request
            echo json_encode(["error" => "Invalid data."]);
            exit();
        }

        // Process the data
        $fullname = mysqli_real_escape_string($conn, $data->fullname);
        $address = mysqli_real_escape_string($conn, $data->address);
        $email = mysqli_real_escape_string($conn, $data->email);
        $contact = intval($data->contact);
        $job = mysqli_real_escape_string($conn, $data->job);
        $queries = mysqli_real_escape_string($conn, $data->queries);

        // Create a prepared statement
        $stmt = mysqli_prepare($conn, "INSERT INTO UserData (fullname, address, email, contact, job, queries) 
                                       VALUES (?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            http_response_code(500); // Internal Server Error
            echo json_encode(["error" => "Statement preparation failed."]);
            exit();
        }

        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "sssssdidi", $city, $country, $date, $weatherCondition, $weatherIcon, $temperature, $pressure, $windSpeed, $humidity);

        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(["message" => "Data inserted successfully."]);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(["error" => "An error occurred while inserting data: " . mysqli_error($conn)]);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } catch (Exception $e) {
        http_response_code(500); // Internal Server Error
        echo json_encode(["error" => "An error occurred: " . $e->getMessage()]);
    }
}

mysqli_close($conn);
?>