<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $pet_id = $_POST["pet-id"];
    $name = $_POST["name"];
    $species = $_POST["species"];
    $breed = $_POST["breed"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $vaccinations = isset($_POST["vaccinations"]) ? 1 : 0;
    $special_needs = $_POST["special-needs"];

    // Validate and sanitize inputs
    $pet_id = filter_var($pet_id, FILTER_SANITIZE_STRING);
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $species = filter_var($species, FILTER_SANITIZE_STRING);
    $breed = filter_var($breed, FILTER_SANITIZE_STRING);
    $age = filter_var($age, FILTER_VALIDATE_INT);
    $gender = filter_var($gender, FILTER_SANITIZE_STRING);
    $vaccinations = filter_var($vaccinations, FILTER_VALIDATE_INT);
    $special_needs = filter_var($special_needs, FILTER_SANITIZE_STRING);

    // Validate the form data (add more validation as needed)
    if (empty($pet_id) || empty($name) || empty($species) || empty($breed) || empty($age) || empty($gender)) {
        echo "All fields are required.";
        exit;
    }

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "adoptionform";


    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "UPDATE pets SET name=?, species=?, breed=?, age=?, gender=?, vaccinations=?, special_needs=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssiisssi", $name, $species, $breed, $age, $gender, $vaccinations, $special_needs, $pet_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Pet details updated successfully.";
    } else {
        echo "Error updating pet details: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
