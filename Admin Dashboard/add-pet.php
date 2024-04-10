<?php
// Assuming you've configured your database connection settings
$host = 'localhost'; // or your host
$dbname = 'pet_adoption';
$username = 'your_username';
$password = 'your_password';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $age = $_POST['age'];

        $sql = "INSERT INTO pets (name, type, age) VALUES (?, ?, ?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$name, $type, $age]);

        echo "New pet added successfully.";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
