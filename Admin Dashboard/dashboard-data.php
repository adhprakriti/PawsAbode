<?php
$host = 'localhost';
$dbname = 'pet_adoption';
$username = 'your_username';
$password = 'your_password';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Example queries (adjust according to your actual database schema)
    $availablePets = $conn->query("SELECT COUNT(*) FROM pets WHERE status = 'available'")->fetchColumn();
    $adoptedPets = $conn->query("SELECT COUNT(*) FROM pets WHERE status = 'adopted'")->fetchColumn();
    $formsSubmitted = $conn->query("SELECT COUNT(*) FROM adoption_requests")->fetchColumn();

    // Returning JSON data
    header('Content-Type: application/json');
    echo json_encode([
        'availablePets' => $availablePets,
        'adoptedPets' => $adoptedPets,
        'formsSubmitted' => $formsSubmitted,
    ]);

} catch(PDOException $e) {
    // Handling error scenario
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
