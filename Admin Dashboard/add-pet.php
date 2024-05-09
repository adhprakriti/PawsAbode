<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adoptionform";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle form submission and database insertion here
        $name = $_POST['name'];
        $species = $_POST['species'];
        $breed = $_POST['breed'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $vaccinations = isset($_POST['vaccinations']) ? 1 : 0;
        $specialNeeds = $_POST['special-needs'];

        $sql = "INSERT INTO pets (name, species, breed, age, gender, vaccinations, special_needs) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$name, $species, $breed, $age, $gender, $vaccinations, $specialNeeds]);

        echo "New pet added successfully.";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
