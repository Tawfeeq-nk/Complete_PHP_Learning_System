<?php
/**
 * MODULE 15: MySQL Functions & PDO Advanced
 * Working with advanced MySQL operations and PDO features
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 15: MySQL Functions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        h2 {
            color: #667eea;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }

        pre {
            background: #f0f0f0;
            padding: 15px;
            border-left: 4px solid #667eea;
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../_nav_ui.php'; ?>
    <?php include __DIR__ . '/../_module_nav.php'; ?>
    <?php include __DIR__ . '/../_nav_ui.php'; ?>

    <div class="container">
        <h1>📊 MODULE 15: MySQL Functions & PDO Advanced</h1>
        <p>Master MySQL functions and advanced PDO techniques.</p>
    </div>

    <div class="container">
        <h2>String Functions</h2>
        <pre>
UPPER() - Convert to uppercase
SELECT UPPER(name) FROM users;

LOWER() - Convert to lowercase
SELECT LOWER(email) FROM users;

CONCAT() - Combine strings
SELECT CONCAT(first_name, ' ', last_name) as full_name FROM users;

LENGTH() - String length
SELECT name, LENGTH(name) as name_length FROM users;

SUBSTRING() - Extract portion
SELECT SUBSTRING(email, 1, 5) FROM users;
    </pre>
    </div>

    <div class="container">
        <h2>Date/Time Functions</h2>
        <pre>
NOW() - Current date and time
INSERT INTO posts (title, created_at) VALUES ('Post', NOW());

DATE() - Extract date from datetime
SELECT DATE(created_at) FROM posts;

DATEDIFF() - Difference between dates
SELECT DATEDIFF(NOW(), created_at) as days_old FROM posts;

DATE_FORMAT() - Format dates
SELECT DATE_FORMAT(created_at, '%Y-%m-%d') FROM posts;
    </pre>
    </div>

    <div class="container">
        <h2>Transactions - Ensuring Data Integrity</h2>
        <pre>
&lt;?php
try {
    $pdo->beginTransaction();
    
    // Multiple operations
    $stmt1 = $pdo->prepare("UPDATE accounts SET balance = balance - 100 WHERE id = 1");
    $stmt1->execute();
    
    $stmt2 = $pdo->prepare("UPDATE accounts SET balance = balance + 100 WHERE id = 2");
    $stmt2->execute();
    
    $pdo->commit(); // Confirm all changes
    echo "Transfer successful!";
} catch (Exception $e) {
    $pdo->rollBack(); // Undo all changes if error
    echo "Transfer failed: " . $e->getMessage();
}
?&gt;
    </pre>
    </div>

    <div class="container">
        <h2>Working with LastInsertId()</h2>
        <pre>
&lt;?php
$sql = "INSERT INTO users (username, email) VALUES (:username, :email)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':username' => 'john', ':email' => 'john@example.com']);

// Get the ID of inserted user
$userId = $pdo->lastInsertId();
echo "User created with ID: " . $userId;
?&gt;
    </pre>
    </div>

</body>

</html>