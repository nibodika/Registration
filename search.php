<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "registration";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = isset($_GET['query']) ? trim($_GET['query']) : '';

    echo "<h2>Search Results for: <em>" . htmlspecialchars($query) . "</em></h2><hr>";

    if (empty($query)) {
        echo "Please enter a search term.";
        exit;
    }

    // Search in Marriage Table
    $stmt1 = $pdo->prepare("
        SELECT * FROM marriage
        WHERE 
            husband_first_name LIKE :q OR
            husband_last_name LIKE :q OR
            husband_email LIKE :q OR
            husband_phone LIKE :q OR
            husband_address LIKE :q OR
            wife_first_name LIKE :q OR
            wife_last_name LIKE :q OR
            wife_email LIKE :q OR
            wife_phone LIKE :q OR
            wife_address LIKE :q OR
            location LIKE :q OR
            witness1_full_name LIKE :q OR
            witness2_full_name LIKE :q
    ");
    $stmt1->execute(['q' => "%$query%"]);
    $marriageResults = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    // Search in Migration Table
    $stmt2 = $pdo->prepare("
        SELECT * FROM migration
        WHERE 
            full_name LIKE :q OR
            gender LIKE :q OR
            nationality LIKE :q OR
            current_address LIKE :q OR
            destination_address LIKE :q OR
            reason_for_migration LIKE :q
    ");
    $stmt2->execute(['q' => "%$query%"]);
    $migrationResults = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    if (!$marriageResults && !$migrationResults) {
        echo "<p>No records found.</p>";
    }

    // Show Marriage Results
    if ($marriageResults) {
        echo "<h3>Marriage Registrations:</h3>";
        foreach ($marriageResults as $row) {
            echo "<div style='border:1px solid #888; padding:10px; margin-bottom:10px; background-color:#f0f0f0'>";
            echo "<strong>Husband:</strong> " . $row['husband_first_name'] . " " . $row['husband_last_name'] . "<br>";
            echo "<strong>Wife:</strong> " . $row['wife_first_name'] . " " . $row['wife_last_name'] . "<br>";
            echo "<strong>Marriage Date:</strong> " . $row['marriage_date'] . "<br>";
            echo "<strong>Location:</strong> " . $row['location'] . "<br>";
            echo "<strong>Witnesses:</strong> " . $row['witness1_full_name'] . ", " . $row['witness2_full_name'] . "<br>";
            echo "</div>";
        }
    }

    // Show Migration Results
    if ($migrationResults) {
        echo "<h3>Migration Registrations:</h3>";
        foreach ($migrationResults as $row) {
            echo "<div style='border:1px solid #888; padding:10px; margin-bottom:10px; background-color:#e9f7ef'>";
            echo "<strong>Name:</strong> " . $row['full_name'] . "<br>";
            echo "<strong>Gender:</strong> " . $row['gender'] . "<br>";
            echo "<strong>Nationality:</strong> " . $row['nationality'] . "<br>";
            echo "<strong>Current Address:</strong> " . $row['current_address'] . "<br>";
            echo "<strong>Destination Address:</strong> " . $row['destination_address'] . "<br>";
            echo "<strong>Reason:</strong> " . $row['reason_for_migration'] . "<br>";
            echo "</div>";
        }
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
