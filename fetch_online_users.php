<?php
header('Content-Type: application/json');

// Database connection details
$host = 'localhost';
$dbname = 'Trader';
$user = 'root';
$pass = '';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to get the online users
    $stmt = $pdo->prepare('SELECT name FROM details WHERE status = "online"');
    $stmt->execute();
    
    // Fetch all results
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Output results as JSON
    echo json_encode($users);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

?>
