<?php
$host = 'localhost';
$dbname = 'pet_adoption';
$username = 'your_username';
$password = 'your_password';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM adoption_requests";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();

    if ($results) {
        echo "<ul>";
        foreach ($results as $request) {
            echo "<li>" . htmlspecialchars($request['adopter_name']) . " - " . htmlspecialchars($request['adopter_email']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No adoption requests found.";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
